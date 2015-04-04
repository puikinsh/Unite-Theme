<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 *
 */

function optionsframework_option_name() {
	return 'unite';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 */

function optionsframework_options() {

	// Option to switch between the_excerpt and the_content
	$blog_layout = array('1' => __('Display full content for each post', 'unite'),'2' => __('Display excerpt for each post', 'unite'));

	// Color schemes
	$site_layout = array('pull-left' => __('Right Sidebar', 'unite'),'pull-right' => __('Left Sidebar', 'unite'));

		// Test data
	$test_array = array(
		'one'   => __('One', 'options_framework_theme'),
		'two'   => __('Two', 'options_framework_theme'),
		'three' => __('Three', 'options_framework_theme'),
		'four'  => __('Four', 'options_framework_theme'),
		'five'  => __('Five', 'options_framework_theme')
	);

	// Multicheck Array
	$multicheck_array = array(
		'one'   => __('French Toast', 'options_framework_theme'),
		'two'   => __('Pancake', 'options_framework_theme'),
		'three' => __('Omelette', 'options_framework_theme'),
		'four'  => __('Crepe', 'options_framework_theme'),
		'five'  => __('Waffle', 'options_framework_theme')
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one'  => '1',
		'five' => '1'
	);

	// Typography Defaults
	$typography_defaults = array(
		'size'  => '15px',
		'face'  => 'Helvetica Neue',
		'style' => 'normal',
		'color' => '#6B6B6B' );

	// Typography Options
	$typography_options = array(
	  'sizes' => array( '6','10','12','14','15','16','18','20','24','28','32','36','42','48' ),
	  'faces' => array(
			'arial'          => 'Arial',
			'verdana'        => 'Verdana, Geneva',
			'trebuchet'      => 'Trebuchet',
			'georgia'        => 'Georgia',
			'times'          => 'Times New Roman',
			'tahoma'         => 'Tahoma, Geneva',
			'palatino'       => 'Palatino',
			'helvetica'      => 'Helvetica',
			'Helvetica Neue' => 'Helvetica Neue'
	),
	  'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
	  'color' => true
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
	  $options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
	  $options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
	  $options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';


	// fixed or scroll position
	$fixed_scroll = array('scroll' => 'Scroll', 'fixed' => 'Fixed');

	$options = array();

	$options[] = array(
		'name' => __('Main', 'unite'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('Home Page Settings', 'unite'),
		'id'      => 'blog_settings',
		'std'     => '1',
		'type'    => 'select',
		'options' => $blog_layout
	);

	$options[] = array(
		"name" => __('Website Layout Options', 'unite'),
		"desc"    => __('Choose between Left and Right sidebar options to be used as default', 'unite'),
		"id"      => "site_layout",
		"std"     => "pull-left",
		"type"    => "select",
		"class"   => "mini",
		"options" => $site_layout
	);

	$options[] = array(
		'name' => __('Element color', 'unite'),
		'desc' => __('Default used if no color is selected', 'unite'),
		'id'   => 'element_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Element color on hover', 'unite'),
		'desc' => __('Default used if no color is selected', 'unite'),
		'id'   => 'element_color_hover',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Custom Favicon', 'unite'),
		'desc' => __('Upload a 32px x 32px PNG/GIF image that will represent your websites favicon', 'unite'),
		'id'   => 'custom_favicon',
		'std'  => '',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => __('Typography', 'unite'),
		'type' => 'heading'
	);

	$options[] = array(
		'name'    => __('Main Body Text', 'unite'),
		'desc'    => __('Used in P tags', 'unite'),
		'id'      => 'main_body_typography',
		'std'     => $typography_defaults,
		'type'    => 'typography',
		'options' => $typography_options
	);

	$options[] = array(
		'name' => __('Heading Color', 'unite'),
		'desc' => __('Default used if no color is selected', 'unite'),
		'id'   => 'heading_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Link Color', 'unite'),
		'desc' => __('Default used if no color is selected', 'unite'),
		'id'   => 'link_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Link:hover Color', 'unite'),
		'desc' => __('Default used if no color is selected', 'unite'),
		'id'   => 'link_hover_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Link:active Color', 'unite'),
		'desc' => __('Default used if no color is selected', 'unite'),
		'id'   => 'link_active_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Header', 'unite'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('Top nav background color', 'unite'),
		'desc' => __('Default used if no color is selected.', 'unite'),
		'id'   => 'top_nav_bg_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Top nav item color', 'unite'),
		'desc' => __('Link color', 'unite'),
		'id'   => 'top_nav_link_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Top nav dropdown background color', 'unite'),
		'desc' => __('Background of dropdown item hover color', 'unite'),
		'id'   => 'top_nav_dropdown_bg',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Top nav dropdown item color', 'unite'),
		'desc' => __('Dropdown item color', 'unite'),
		'id'   => 'top_nav_dropdown_item',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Footer', 'unite'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('Footer Background Color', 'unite'),
		'id'   => 'footer_bg_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Footer Text Color', 'unite'),
		'id'   => 'footer_text_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Footer Link Color', 'unite'),
		'id'   => 'footer_link_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Footer information', 'unite'),
		'desc' => __('Copyright text in footer', 'unite'),
		'id'   => 'custom_footer_text',
		'std'  => '<a href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr( get_bloginfo( 'name', 'display' ) ) . '" >' . get_bloginfo( 'name', 'display' ) . '</a>.  All rights reserved.',
		'type' => 'textarea'
	);

	$options[] = array(
		'name' => __('Social', 'unite'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('Social Icon Color', 'unite'),
		'desc' => __('Default used if no color is selected', 'unite'),
		'id'   => 'social_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name' => __('Social Icon:hover Color', 'unite'),
		'desc' => __('Default used if no color is selected', 'unite'),
		'id'   => 'social_hover_color',
		'std'  => '',
		'type' => 'color'
	);

	$options[] = array(
		'name'  => __('Add full URL for your social network profiles', 'unite'),
		'desc'  => __('Facebook', 'unite'),
		'id'    => 'social_facebook',
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_twitter',
		'desc'  => __('Twitter', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_google',
		'desc'  => __('Google+', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_youtube',
		'desc'  => __('Youtube', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_linkedin',
		'desc'  => __('LinkedIn', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_pinterest',
		'desc'  => __('Pinterest', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_feed',
		'desc'  => __('RSS Feed', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_tumblr',
		'desc'  => __('Tumblr', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_flickr',
		'desc'  => __('Flickr', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_instagram',
		'desc'  => __('Instagram', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_dribbble',
		'desc'  => __('Dribbble', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_skype',
		'desc'  => __('Skype', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'id'    => 'social_vimeo',
		'desc'  => __('Vimeo', 'unite'),
		'std'   => '',
		'class' => 'mini',
		'type'  => 'text'
	);

	$options[] = array(
		'name' => __('Other', 'unite'),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __('Custom CSS', 'unite'),
		'desc' => __('Additional CSS', 'unite'),
		'id'   => 'custom_css',
		'std'  => '',
		'type' => 'textarea'
	);

	return $options;
}