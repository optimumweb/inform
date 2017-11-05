<?php

function enqueue()
{
	if ( !is_admin() ) {
	    // libs
	    wpbp_enqueue_lib(array( 'modernizr', 'jquery', 'wpbp', 'fontawesome' ));
		// scripts
		wp_enqueue_script('theme', THEME_URI . '/js/scripts.js', array( 'jquery' ));
		// styles
		wp_enqueue_style('theme', THEME_URI . '/css/master.css', array( 'wpbp' ), time());
	}
}
add_action('init', 'enqueue');


function inform_init()
{
	load_theme_textdomain('inform', THEME_DIRECTORY . '/lang');

	add_image_size('inform_square', 400,  400, true);
	add_image_size('inform_mini',   200,  100, true);
	add_image_size('inform_small',  400,  200, true);
	add_image_size('inform_medium', 800,  400, true);
	add_image_size('inform_large',  1200, 600, true);
	add_image_size('inform_cover',  2000, 400, true);

	add_editor_style('editor-style.css');
}
add_action('init', 'inform_init');


function inform_sidebars_init()
{
	wpbp_register_sidebars(array( "Footer" ));
}
add_action('widgets_init', 'inform_sidebars_init');


function inform_compile_lesscss()
{
	require_once THEME_DIRECTORY . '/inc/lessphp/lessc.inc.php';

	$default_options = inform_default_options();

	try {

		$less = new lessc;

		$variables = array(
			'baseFontFamily'     => $default_options['base_font_family'],
			'hFontFamily'        => $default_options['heading_font_family'],
			'primaryColor'       => $default_options['primary_color'],
			'complimentaryColor' => $default_options['complimentary_color'],
			'contrastColor'      => $default_options['contrast_color'],
			'textColor'          => $default_options['text_color'],
			'headingsColor'      => $default_options['headings_color'],
			'contrastTextColor'  => $default_options['contrast_text_color']
		);

		if ( function_exists('of_get_option') ) {
			$variables = array_merge($variables, array_filter(array(
				'baseFontFamily'     => of_get_option('base_font_family') ? of_get_option('base_font_family') : null,
				'hFontFamily'        => of_get_option('heading_font_family') ? of_get_option('heading_font_family') : null,
				'primaryColor'       => of_get_option('primary_color') ? of_get_option('primary_color') : null,
				'complimentaryColor' => of_get_option('complimentary_color') ? of_get_option('complimentary_color') : null,
				'contrastColor'      => of_get_option('contrast_color') ? of_get_option('contrast_color') : null,
				'textColor'          => of_get_option('text_color') ? of_get_option('text_color') : null,
				'headingsColor'      => of_get_option('headings_color') ? of_get_option('headings_color') : null,
				'contrastTextColor'  => of_get_option('contrast_text_color') ? of_get_option('contrast_text_color') : null
			)));
		}

		$less->setVariables($variables);

		$input  = THEME_DIRECTORY . '/css/master.less';
		$output = THEME_DIRECTORY . '/css/master.css';

		$less->compileFile($input, $output);

	} catch ( Exception $e ) {
		echo $e;
	}
}

if ( isset($_GET['recompile_css']) || is_user_logged_in() ) {
	add_action('init', 'inform_compile_lesscss');
}


function inform_default_options()
{
	return array(
		'base_font_family'    => "Helvetica, Arial, sans-serif",
		'heading_font_family' => "Helvetica, Arial, sans-serif",
		'primary_color'       => "#007363",
		'complimentary_color' => "#002b73",
		'contrast_color'      => "#ffd614",
		'text_color'          => "#646464",
		'headings_color'      => "#444444",
		'contrast_text_color' => "#000000"
	);
}


function inform_add_style_select_buttons($buttons)
{
	array_unshift($buttons, 'styleselect');
	return $buttons;
}
add_filter('mce_buttons_2', 'inform_add_style_select_buttons');


function inform_custom_styles($init_array)
{
	$style_formats = array(
		array(
			'title'   => __("Heading Number", 'inform'),
			'inline'  => 'span',
			'classes' => 'heading-number'
		)
	);

	$init_array['style_formats'] = json_encode($style_formats);

	return $init_array;
}
add_filter('tiny_mce_before_init', 'inform_custom_styles');


function inform_post_main_category_name($post_id = false)
{
	if ( !$post_id ) $post_id = get_post_id();
	if ( $main_category_id = get_post_meta($post_id, '_yoast_wpseo_primary_category', true) ) {
		$main_category = get_term($main_category_id, 'category');
	} else {
		$categories = get_the_category($post_id);
		if ( !empty($categories) && is_array($categories) ) {
			foreach ( $categories as $category ) {
				$main_category = $category;
				break;
			}
		}
	}
	if ( isset($main_category) && is_object($main_category) && property_exists($main_category, 'name') ) {
		return $main_category->name;
	}
}
