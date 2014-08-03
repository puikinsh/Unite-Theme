// first set the body to hide and show everything when fully loaded
jQuery(document).ready(function(){

	// here for each comment reply link of WordPress
	jQuery( '.comment-reply-link' ).addClass( 'btn btn-primary' );

	// here for the submit button of the comment reply form
	jQuery( '#submit' ).addClass( 'btn btn-primary' );

	// Style contact form submit button
	jQuery( '.wpcf7-submit' ).addClass( 'btn btn-primary' );

	// Add thumbnail styling
	jQuery( '.wp-caption' ).addClass( 'thumbnail' );

	// Now we'll add some classes for the WordPress default widgets - let's go

	jQuery( '.widget_rss ul' ).addClass( 'media-list' );

	// Add Bootstrap style for drop-downs
	jQuery( '.postform' ).addClass( 'form-control' );

	jQuery( 'table#wp-calendar' ).addClass( 'table table-striped');

	jQuery(document.body).show();

});

// Skip link focus fix
( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && 'undefined' !== typeof( document.getElementById ) ) {
		var eventMethod = ( window.addEventListener ) ? 'addEventListener' : 'attachEvent';
		window[ eventMethod ]( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) )
					element.tabIndex = -1;

				element.focus();
			}
		}, false );
	}
})();