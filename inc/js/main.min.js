jQuery(document).ready(function(){jQuery(".comment-reply-link").addClass("btn btn-primary");jQuery("#submit").addClass("btn btn-primary");jQuery(".wpcf7-submit").addClass("btn btn-primary");jQuery(".wp-caption").addClass("thumbnail");jQuery(".widget_rss ul").addClass("media-list");jQuery(".postform").addClass("form-control");jQuery("table#wp-calendar").addClass("table table-striped");jQuery(document.body).show();});

// Skip link focus fix
( function() {
	var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
	    is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
	    is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

	if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
		window.addEventListener( 'hashchange', function() {
			var element = document.getElementById( location.hash.substring( 1 ) );

			if ( element ) {
				if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
					element.tabIndex = -1;
				}

				element.focus();
			}
		}, false );
	}
})();