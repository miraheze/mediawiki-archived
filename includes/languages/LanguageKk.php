<?php
/**
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
 * Kazakh (Қазақша) specific code.
 *
 * This handles Cyrillic, Latin and Arabic scripts for Kazakh.
 * Right now, we distinguish `kk_cyrl`, `kk_latn`, `kk_arab`, `kk_kz`, `kk_tr`,
 * and `kk_cn`.
 *
 * @ingroup Languages
 */
class LanguageKk extends LanguageKk_cyrl {
	/**
	 * Fixes an issue with ucfirst for transforming 'i' to 'İ'
	 *
	 * @inheritDoc
	 */
	public function ucfirst( $str ) {
		if ( substr( $str, 0, 1 ) === 'i' ) {
			$variant = $this->getConverterInternal()->getPreferredVariant();
			if ( $variant == 'kk-latn' || $variant == 'kk-tr' ) {
				return 'İ' . substr( $str, 1 );
			}
		}
		return parent::ucfirst( $str );
	}

	/**
	 * Fixes issue with lcfirst for transforming 'I' to 'ı'
	 *
	 * @inheritDoc
	 */
	public function lcfirst( $str ) {
		if ( substr( $str, 0, 1 ) === 'I' ) {
			$variant = $this->getConverterInternal()->getPreferredVariant();
			if ( $variant == 'kk-latn' || $variant == 'kk-tr' ) {
				return 'ı' . substr( $str, 1 );
			}
		}
		return parent::lcfirst( $str );
	}

	public function convertGrammar( $word, $case ) {
		// T277689: If there's no word, then there's nothing to convert.
		if ( $word === '' ) {
			return '';
		}

		$variant = $this->getConverterInternal()->getPreferredVariant();
		switch ( $variant ) {
			case 'kk-arab':
			case 'kk-cn':
				$word = parent::convertGrammarKk_arab( $word, $case );
				break;
			case 'kk-latn':
			case 'kk-tr':
				$word = parent::convertGrammarKk_latn( $word, $case );
				break;
			case 'kk-cyrl':
			case 'kk-kz':
			case 'kk':
			default:
				$word = parent::convertGrammarKk_cyrl( $word, $case );
		}

		return $word;
	}
}
