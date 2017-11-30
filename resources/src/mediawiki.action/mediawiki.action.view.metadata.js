/*!
 * Exif metadata display for MediaWiki file uploads
 *
 * Add an expand/collapse link and collapse by default if set to
 * (with JS disabled, user will see all items)
 *
 * See also ImagePage.php#makeMetadataTable (creates the HTML)
 */
( function ( mw, $ ) {
	$( function () {
		var $row, $col, $link,
			showText = mw.msg( 'metadata-expand' ),
			hideText = mw.msg( 'metadata-collapse' ),
			$table = $( '#mw_metadata' ),
			$tbody = $table.find( 'tbody' );

		if ( !$tbody.find( '.collapsable' ).length ) {
			return;
		}

		$row = $( '<tr class="mw-metadata-show-hide-extended"></tr>' );
		$col = $( '<td colspan="2"></td>' );

		$link = $( '<a>' )
			.text( showText )
			.attr( {
				role: 'button',
				tabindex: 0
			} )
			.on( 'click keypress', function ( e ) {
				if (
					e.type === 'click' ||
					e.type === 'keypress' && e.which === 13
				) {
					if ( $table.hasClass( 'collapsed' ) ) {
						$( this ).text( hideText );
					} else {
						$( this ).text( showText );
					}
					$table.toggleClass( 'expanded collapsed' );
				}
			} );

		$col.append( $link );
		$row.append( $col );
		$tbody.append( $row );

		// And collapse!
		$table.addClass( 'collapsed' );
	} );

}( mediaWiki, jQuery ) );
