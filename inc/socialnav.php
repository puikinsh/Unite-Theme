<?php

/**
 * Social Navigation Menu 
 */

/**
 * Register Social Icon menu
 */
add_action( 'init', 'register_social_menu' );

function register_social_menu() {
	register_nav_menu( 'social-menu', _x( 'Social Menu', 'nav menu location', 'unite' ) );
}

if ( ! function_exists( 'unite_social_icons' ) ) :
/**
 * Display social links in footer and widgets
 *
 * @package unite
 */
function unite_social_icons(){
  if ( has_nav_menu( 'social-menu' ) ) {
  	wp_nav_menu(
  		array(
  			'theme_location'  => 'social-menu',
  			'container'       => 'nav',
  			'container_id'    => 'social',
  			'container_class' => 'social-icons',
  			'menu_id'         => 'menu-social-items',
  			'menu_class'      => 'social-menu',
  			'depth'           => 1,
  			'fallback_cb'     => '',
                        'link_before'     => '<i class="social_icon fa"><span>',
                        'link_after'      => '</span></i>'
  		)
	  );
  }
}
endif;

/* Unite Social Nav CSS */
function unite_social_css(){ ?>
    <style type="text/css">
        #social li {
            display: inline-block;
        }
        #social li,
        #social ul {
            border: 0!important;
            list-style: none;
            padding-left: 0;
            text-align: center;
        }
        .social-icons ul a {
            font-size: 24px;
            margin: 6px;
            color: #DDD;
        }
        #social ul a span {
            display: none;
        }
        #social li a[href*="twitter.com"] .fa:before,
        .fa-twitter:before {
            content: "\f099"
        }
        #social li a[href*="facebook.com"] .fa:before,
        .fa-facebook-f:before,
        .fa-facebook:before {
            content: "\f09a"
        }
        #social li a[href*="github.com"] .fa:before,
        .fa-github:before {
            content: "\f09b"
        }
        #social li a[href*="/feed"] .fa:before,
        .fa-rss:before {
            content: "\f09e"
        }
        #social li a[href*="pinterest.com"] .fa:before,
        .fa-pinterest:before {
            content: "\f0d2"
        }
        #social li a[href*="plus.google.com"] .fa:before,
        .fa-google-plus:before {
            content: "\f0d5"
        }
        #social li a[href*="linkedin.com"] .fa:before,
        .fa-linkedin:before {
            content: "\f0e1"
        }
        #social li a[href*="xing.com"] .fa:before,
        .fa-xing:before {
            content: "\f168"
        }
        #social li a[href*="youtube.com"] .fa:before,
        .fa-youtube:before {
            content: "\f167"
        }
        #social li a[href*="instagram.com"] .fa:before,
        .fa-instagram:before {
            content: "\f16d"
        }
        #social li a[href*="flickr.com"] .fa:before,
        .fa-flickr:before {
            content: "\f16e"
        }
        #social li a[href*="tumblr.com"] .fa:before,
        .fa-tumblr:before {
            content: "\f173"
        }
        #social li a[href*="dribbble.com"] .fa:before,
        .fa-dribbble:before {
            content: "\f17d"
        }
        #social li a[href*="skype:"] .fa:before,
        #social li a[href*="skype.com"] .fa:before,
        .fa-skype:before {
            content: "\f17e"
        }
        #social li a[href*="foursquare.com"] .fa:before,
        .fa-foursquare:before {
            content: "\f180"
        }
        #social li a[href*="vimeo.com"] .fa:before,
        .fa-vimeo-square:before {
            content: "\f194"
        }
        #social li a[href*="spotify.com"] .fa:before,
        .fa-spotify:before {
            content: "\f1bc"
        }
        #social li a[href*="soundcloud.com"] .fa:before,
        .fa-soundcloud:before {
            content: "\f1be"
        }
        
        .social-icons li a[href*="facebook.com"]:hover {color: #3b5998 !important;}
        .social-icons li a[href*="twitter.com"]:hover {color: #00aced !important;}
        .social-icons li a[href*="plus.google.com"]:hover {color: #dd4b39 !important;}
        .social-icons li a[href*="youtube.com"]:hover {color: #bb0000 !important;}
        .social-icons li a[href*="github.com"]:hover {color: #4183C4 !important;}
        .social-icons li a[href*="linkedin.com"]:hover {color: #007bb6 !important;}
        .social-icons li a[href*="xing.com"]:hover {color: #cfdc00 !important;}
        .social-icons li a[href*="pinterest.com"]:hover {color: #cb2027 !important;}
        .social-icons li a[href*="rss.com"]:hover {color: #F0AD4E !important ;}
        .social-icons li a[href*="tumblr.com"]:hover {color: #32506d !important;}
        .social-icons li a[href*="flickr.com"]:hover {color: #ff0084 !important;}
        .social-icons li a[href*="instagram.com"]:hover {color: #517fa4 !important;}
        .social-icons li a[href*="dribbble.com"]:hover {color: #E56193 !important;}
        .social-icons li a[href*="skype.com"]:hover {color: #00AFF0 !important;}
        .social-icons li a[href*="foursquare.com"]:hover {color: #2398C9 !important;}
        .social-icons li a[href*="soundcloud.com"]:hover {color: #F50 !important;}
        .social-icons li a[href*="vimeo.com"]:hover {color:  #1bb6ec !important;}
        .social-icons li a[href*="spotify.com"]:hover {color: #81b71a !important;}
        .social-icons li a[href*="/feed"]:hover {color: #f39c12 !important;}
    </style><?php
}
add_action( 'wp_head', 'unite_social_css', 10 );