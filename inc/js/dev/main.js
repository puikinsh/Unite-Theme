// first set the body to hide and show everything when fully loaded
document.write("<style>body{display:none;}</style>");

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