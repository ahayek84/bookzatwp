<?php
/**
 * dapza Theme Customizer
 *
 * @package dapza
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dapza_customize_register( $wp_customize ) {

	global $dapza_options_array;
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'dapza_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'dapza_customize_partial_blogdescription',
		) );
	}
	
	$wp_customize->add_section( 'dapza_settings', array(
		
		'title'      => __('dapza Settings', 'dapza'),
		'priority'   => 20,
		'active_callback' => '',
		
	) );
	
	$wp_customize->add_setting( 'dapza_slider_cat',
	 array(
		'default'    => 'select',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'dapza_sanitize_category_select',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize, //Pass the $wp_customize object (required)
	'dapza_slider_cat', //Set a unique ID for the control
		array(
		'label'      => __( 'Slider Category', 'dapza' ),
		'description' => __( 'Posts from this category will show up in slider.', 'dapza'),
		'settings'   => 'dapza_slider_cat',
		'priority'   => 10,
		'section'    => 'dapza_settings',
		'type'    => 'select',
		'choices' => $dapza_options_array['categories'],
	 	)
	) );
	
	$wp_customize->add_setting( 'dapza_slider_num',
	 array(
		'default'    => '5',
		'capability' => 'edit_theme_options',
		 'sanitize_callback' => 'dapza_sanitize_slider_slides',
	 ) 
	);

	$wp_customize->add_control( new WP_Customize_Control(
	 $wp_customize, //Pass the $wp_customize object (required)
	 'dapza_slider_num', //Set a unique ID for the control
	 array(
		'label'      => __( 'How many slides', 'dapza' ),
		'description' => __( 'Select how many slides to show in slider.', 'dapza'),
		'settings'   => 'dapza_slider_num',
		'priority'   => 20,
		'section'    => 'dapza_settings',
		'type'    => 'select',
		'choices' => $dapza_options_array['slides'],
	 )
	) );	
	
	
}
add_action( 'customize_register', 'dapza_customize_register' );

$dapza_options_array = array();
$dapza_options_array['categories'] = array( 'select' => __( 'Select', 'dapza' ) );
$dapza_options_array['slides'] = array( '1' => __( '1', 'dapza' ), '2' => __( '2', 'dapza' ), '3' => __( '3', 'dapza' ), '4' => __( '4', 'dapza' ), '5' => __( '5', 'dapza' ), '6' => __( '6', 'dapza' ), '7' => __( '7', 'dapza' ), '8' => __( '8', 'dapza' ), '9' => __( '9', 'dapza' ), '10' => __( '10', 'dapza' ) );

$dapza_categories_raw = get_categories( array( 'orderby' => 'name', 'order' => 'ASC', 'hide_empty' => 0, ) );

foreach( $dapza_categories_raw as $category ){
	
	$dapza_options_array['categories'][$category->term_id] = $category->name;
	
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function dapza_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function dapza_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function dapza_customize_preview_js() {
	wp_enqueue_script( 'dapza-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'dapza_customize_preview_js' );

function dapza_sanitize_category_select( $value ){
	
	global $dapza_options_array;
	
	if( ! array_key_exists( $value, $dapza_options_array['categories'] ) ){
		
		$value = 'select';
		
	}
	return $value;
	
}

function dapza_sanitize_slider_slides( $value ){
	
	global $dapza_options_array;
	
	if( ! array_key_exists( $value, $dapza_options_array['slides'] ) ){
		
		$value = '5';
		
	}
	return $value;
	
}
