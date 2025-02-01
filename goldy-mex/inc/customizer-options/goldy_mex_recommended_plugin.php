<?php
/* Notifications in customizer */
$my_theme = wp_get_theme();
$theme_name = $my_theme->get( 'TextDomain' );
require get_template_directory()  . '/inc/customizer-notify/goldy-mex-notify.php';
$goldy_mex_config_customizer = array(
	'recommended_plugins'       => array(
		'slivery-extender' => array(
			'recommended' => true,
			'description' => sprintf(__('Install and activate <strong>Slivery Extender</strong> plugin for taking full advantage of all the features this theme has to offer %1$s.', 'goldy-mex'),
				esc_attr($theme_name)
			),
		),
	),
	'recommended_actions'       => array(),
	'recommended_actions_title' => esc_html__( 'Recommended Actions', 'goldy-mex' ),
	'recommended_plugins_title' => esc_html__( 'Recommended Plugin', 'goldy-mex' ),
	'install_button_label'      => esc_html__( 'Install and Activate', 'goldy-mex' ),
	'activate_button_label'     => esc_html__( 'Activate', 'goldy-mex' ),
	'goldy_mex_deactivate_button_label'   => esc_html__( 'Deactivate', 'goldy-mex' ),
);
goldy_mex_Customizer_Notify::init( apply_filters( 'goldy_mex_recommended_plugins', $goldy_mex_config_customizer ) );