<?php
/**
 * goldy-mex Theme Customizer
 *
 * @package goldy-mex
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
add_action('init',"goldy_mex_documentation_files",95);
function goldy_mex_documentation_files(){
	global $goldy_mex_themetype;
	// Documentation
		new \Kirki\Section(
			'goldy_documentation_Upsell_Section',
				[
					'title'       => esc_html__( 'Documentation', 'goldy-mex' ),
					'type'        => 'link',
					'button_text' => esc_html__( 'View', 'goldy-mex' ),
					'button_url'  => $goldy_mex_themetype['goldy_documentation_Upsell_Section'],
					'priority' => 1,
				]
			);

	// pro version button
		new \Kirki\Section(
		'pro_section_custom_control',
			[
				'title'       => esc_html__( 'Premium version', 'goldy-mex' ),
				'type'        => 'link',
				'button_text' => esc_html__( 'Upgrade', 'goldy-mex' ),
				'button_url'  => $goldy_mex_themetype['pro_section_custom_control'],
				'priority' => 1,
			]
		);	
}

function goldy_mex_customize_register( $wp_customize ) {

	$wp_customize->remove_control('background_color');
	$wp_customize->remove_section('header_image');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');

}
add_action( 'customize_register', 'goldy_mex_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function my_register_blogname_partials( WP_Customize_Manager $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

    $wp_customize->selective_refresh->add_partial( 'header_site_title', [
        'selector'        => '.site-title a',
        'settings'        => [ 'blogname' ],
        'render_callback' => function() {
            return get_bloginfo( 'name', 'display' );
        },
	] );

    $wp_customize->selective_refresh->add_partial( 'document_title', [
        'selector'        => '.site-description',
        'settings'        => [ 'blogdescription' ],
        'render_callback' => 'wp_get_document_title',
	] );
}
add_action( 'customize_register', 'my_register_blogname_partials' );


/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function goldy_mex_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function goldy_mex_customize_preview_js() {
	wp_enqueue_script( 'jquery-ui-sortable' );
	wp_enqueue_script( 'goldy-mex-customizer', get_template_directory_uri() . '/assets/js/goldy-mex-customizer.js', array( 'customize-preview' ), _GOLDY_MEX_VERSION, true );
	// wp_register_script( 'goldy-mex-customize-custom-js', get_template_directory_uri() . '/assets/js/goldy-mex-customs.js' );
	$temp = array(
    	'ajaxUrl' => admin_url( 'admin-ajax.php' )
	);
}
add_action( 'customize_preview_init', 'goldy_mex_customize_preview_js' );

function goldy_mex_customizer_css() {

    wp_enqueue_style( 'goldy-mex-customize-controls-style', get_template_directory_uri() . '/assets/css/goldy-mex-customizer-admin.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'goldy_mex_customizer_css',0 );
