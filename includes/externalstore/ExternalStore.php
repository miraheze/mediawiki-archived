<?php
/**
 * @defgroup ExternalStorage ExternalStorage
 */

/**
 * Interface for data storage in external repositories.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 *
 * @file
 */

/**
 * Constructor class for key/value blob data kept in external repositories.
 *
 * Objects in external stores are defined by a special URL. The URL is of
 * the form "<store protocal>://<location>/<object name>". The protocal is used
 * to determine what ExternalStoreMedium class is used. The location identifies
 * particular storage instances or database clusters for store class to use.
 *
 * When an object is inserted into a store, the calling code uses a partial URL of
 * the form "<store protocal>://<location>" and receives the full object URL on success.
 * This is useful since object names can be sequential IDs, UUIDs, or hashes.
 * Callers are not responsible for unique name generation.
 *
 * External repositories might be populated by maintenance/async
 * scripts, thus partial moving of data may be possible, as well
 * as the possibility to have any storage format (i.e. for archives).
 *
 * @ingroup ExternalStorage
 */
class ExternalStore {
	/**
	 * Get an external store object of the given type, with the given parameters
	 *
	 * @param $proto string Type of external storage, should be a value in $wgExternalStores
	 * @param $params array Associative array of ExternalStoreMedium parameters
	 * @return ExternalStoreMedium|bool The store class or false on error
	 */
	public static function getStoreObject( $proto, array $params = array() ) {
		global $wgExternalStores;

		if ( !$wgExternalStores || !in_array( $proto, $wgExternalStores ) ) {
			return false; // protocol not enabled
		}

		$class = 'ExternalStore' . ucfirst( $proto );
		// Any custom modules should be added to $wgAutoLoadClasses for on-demand loading
		return MWInit::classExists( $class ) ? new $class( $params ) : false;
	}

	/**
	 * Fetch data from given URL
	 *
	 * @param $url string The URL of the text to get
	 * @param $params array Associative array of ExternalStoreMedium parameters
	 * @return string|bool The text stored or false on error
	 * @throws MWException
	 */
	public static function fetchFromURL( $url, array $params = array() ) {
		$parts = explode( '://', $url, 2 );
		if ( count( $parts ) != 2 ) {
			return false; // invalid URL
		}

		list( $proto, $path ) = $parts;
		if ( $path == '' ) { // bad URL
			return false;
		}

		$store = self::getStoreObject( $proto, $params );
		if ( $store === false ) {
			return false;
		}

		return $store->fetchFromURL( $url );
	}

	/**
	 * Store a data item to an external store, identified by a partial URL
	 * The protocol part is used to identify the class, the rest is passed to the
	 * class itself as a parameter.
	 *
	 * @param $url String A partial external store URL ("<store type>://<location>")
	 * @param $data string
	 * @param $params array Associative array of ExternalStoreMedium parameters
	 * @return string|bool The URL of the stored data item, or false on error
	 * @throws MWException
	 */
	public static function insert( $url, $data, array $params = array() ) {
		$parts = explode( '://', $url, 2 );
		if ( count( $parts ) != 2 ) {
			return false; // invalid URL
		}

		list( $proto, $path ) = $parts;
		if ( $path == '' ) { // bad URL
			return false;
		}

		$store = self::getStoreObject( $proto, $params );
		if ( $store === false ) {
			return false;
		} else {
			return $store->store( $path, $data );
		}
	}

	/**
	 * Like insert() above, but does more of the work for us.
	 * This function does not need a url param, it builds it by
	 * itself. It also fails-over to the next possible clusters.
	 *
	 * @param $data string
	 * @param $params array Associative array of ExternalStoreMedium parameters
	 * @return string|bool The URL of the stored data item, or false on error
	 * @throws MWException
	 */
	public static function insertToDefault( $data, array $params = array() ) {
		global $wgDefaultExternalStore;

		$error = false;
		$tryStores = (array)$wgDefaultExternalStore;
		while ( count( $tryStores ) > 0 ) {
			$index = mt_rand( 0, count( $tryStores ) - 1 );
			$storeUrl = $tryStores[$index];
			wfDebug( __METHOD__.": trying $storeUrl\n" );
			list( $proto, $path ) = explode( '://', $storeUrl, 2 );
			$store = self::getStoreObject( $proto, $params );
			if ( $store === false ) {
				throw new MWException( "Invalid external storage protocol - $storeUrl" );
			}
			try {
				$url = $store->store( $path, $data ); // Try to save the object
			} catch ( MWException $error ) {
				$url = false;
			}
			if ( strlen( $url ) ) {
				return $url; // Done!
			} else {
				unset( $tryStores[$index] ); // Don't try this one again!
				$tryStores = array_values( $tryStores ); // Must have consecutive keys
				wfDebugLog( 'ExternalStorage',
					"Unable to store text to external storage $storeUrl" );
			}
		}
		// All stores failed
		if ( $error ) {
			throw $error; // rethrow the last error
		} else {
			throw new MWException( "Unable to store text to external storage" );
		}
	}

	/**
	 * @param $data string
	 * @param $wiki string
	 * @return string|bool The URL of the stored data item, or false on error
	 * @throws MWException
	 */
	public static function insertToForeignDefault( $data, $wiki ) {
		return self::insertToDefault( $data, array( 'wiki' => $wiki ) );
	}
}
