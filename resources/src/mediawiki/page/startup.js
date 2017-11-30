( function ( mw, $ ) {
	// Break out of framesets
	if ( mw.config.get( 'wgBreakFrames' ) ) {
		// Note: In IE < 9 strict comparison to window is non-standard (the standard didn't exist yet)
		// it works only comparing to window.self or window.window (http://stackoverflow.com/q/4850978/319266)
		if ( window.top !== window.self ) {
			// Un-trap us from framesets
			window.top.location.href = location.href;
		}
	}

	$( function () {
		var $diff;

		/**
		 * Fired when wiki content is being added to the DOM
		 *
		 * It is encouraged to fire it before the main DOM is changed (when $content
		 * is still detached).  However, this order is not defined either way, so you
		 * should only rely on $content itself.
		 *
		 * This includes the ready event on a page load (including post-edit loads)
		 * and when content has been previewed with LivePreview.
		 *
		 * @event wikipage_content
		 * @member mw.hook
		 * @param {jQuery} $content The most appropriate element containing the content,
		 *   such as #mw-content-text (regular content root) or #wikiPreview (live preview
		 *   root)
		 */
		mw.hook( 'wikipage.content' ).fire( $( '#mw-content-text' ) );

		$diff = $( 'table.diff[data-mw="interface"]' );
		if ( $diff.length ) {
			/**
			 * Fired when the diff is added to a page containing a diff
			 *
			 * Similar to the {@link mw.hook#event-wikipage_content wikipage.content hook}
			 * $diff may still be detached when the hook is fired.
			 *
			 * @event wikipage_diff
			 * @member mw.hook
			 * @param {jQuery} $diff The root element of the MediaWiki diff (`table.diff`).
			 */
			mw.hook( 'wikipage.diff' ).fire( $diff.eq( 0 ) );
		}
	} );

}( mediaWiki, jQuery ) );
