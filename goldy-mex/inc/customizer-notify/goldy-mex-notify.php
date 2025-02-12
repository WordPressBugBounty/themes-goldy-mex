<?php

class goldy_mex_Customizer_Notify {

	private $recommended_actions;

	
	private $recommended_plugins;

	
	private static $instance;

	
	private $recommended_actions_title;

	
	private $recommended_plugins_title;

	
	private $dismiss_button;

	
	private $install_button_label;

	
	private $activate_button_label;

	
	private $goldy_mex_deactivate_button_label;


	private $config;

	
	public static function init( $config ) {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof goldy_mex_Customizer_Notify ) ) {
			self::$instance = new goldy_mex_Customizer_Notify;
			if ( ! empty( $config ) && is_array( $config ) ) {
				self::$instance->config = $config;
				self::$instance->setup_config();
				self::$instance->setup_actions();
			}
		}

	}

	
	public function setup_config() {

		global $goldy_mex_customizer_notify_recommended_plugins;
		global $goldy_mex_customizer_notify_recommended_actions;

		global $install_button_label;
		global $activate_button_label;
		global $goldy_mex_deactivate_button_label;

		$this->recommended_actions = isset( $this->config['recommended_actions'] ) ? $this->config['recommended_actions'] : array();
		$this->recommended_plugins = isset( $this->config['recommended_plugins'] ) ? $this->config['recommended_plugins'] : array();

		$this->recommended_actions_title = isset( $this->config['recommended_actions_title'] ) ? $this->config['recommended_actions_title'] : '';
		$this->recommended_plugins_title = isset( $this->config['recommended_plugins_title'] ) ? $this->config['recommended_plugins_title'] : '';
		$this->dismiss_button            = isset( $this->config['dismiss_button'] ) ? $this->config['dismiss_button'] : '';

		$goldy_mex_customizer_notify_recommended_plugins = array();
		$goldy_mex_customizer_notify_recommended_actions = array();

		if ( isset( $this->recommended_plugins ) ) {
			$goldy_mex_customizer_notify_recommended_plugins = $this->recommended_plugins;
		}

		if ( isset( $this->recommended_actions ) ) {
			$goldy_mex_customizer_notify_recommended_actions = $this->recommended_actions;
		}

		$install_button_label    = isset( $this->config['install_button_label'] ) ? $this->config['install_button_label'] : '';
		$activate_button_label   = isset( $this->config['activate_button_label'] ) ? $this->config['activate_button_label'] : '';
		$goldy_mex_deactivate_button_label = isset( $this->config['goldy_mex_deactivate_button_label'] ) ? $this->config['goldy_mex_deactivate_button_label'] : '';

	}

	
	public function setup_actions() {

		// Register the section
		add_action( 'customize_register', array( $this, 'goldy_mex_plugin_notification_customize_register' ) );

		// Enqueue scripts and styles
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'goldy_mex_customizer_notify_scripts_for_customizer' ), 0 );

		/* ajax callback for dismissable recommended actions */
		add_action( 'wp_ajax_quality_customizer_notify_dismiss_action', array( $this, 'goldy_mex_customizer_notify_dismiss_recommended_action_callback' ) );

		add_action( 'wp_ajax_ti_customizer_notify_dismiss_recommended_plugins', array( $this, 'goldy_mex_customizer_notify_dismiss_recommended_plugins_callback' ) );

	}

	
	public function goldy_mex_customizer_notify_scripts_for_customizer() {

		wp_enqueue_style( 'goldy_mex-customizer-notify-css', get_template_directory_uri() . '/inc/customizer-notify/css/goldy-mex-customizer-notify.css', array());

		wp_enqueue_style( 'goldy_mex-plugin-install' );
		wp_enqueue_script( 'goldy_mex-plugin-install' );
		wp_add_inline_script( 'goldy_mex-plugin-install', 'var pagenow = "customizer";' );

		wp_enqueue_script( 'goldy_mex-updates' );

		wp_enqueue_script( 'goldy_mex-customizer-notify-js', get_template_directory_uri() . '/inc/customizer-notify/js/goldy-mex-notify.js', array( 'customize-controls' ));
		wp_localize_script(
			'goldy_mex-customizer-notify-js', 'goldy_mexCustomizercompanionObject', array(
				'goldy_mex_ajaxurl'            => esc_url(admin_url( 'admin-ajax.php' )),
				'goldy_mex_template_directory' => esc_url(get_template_directory_uri()),
				'goldy_mex_base_path'          => esc_url(admin_url()),
				'goldy_mex_activating_string'  => __( 'Activating', 'goldy-mex' ),
			)
		);

	}

	
	public function goldy_mex_plugin_notification_customize_register( $wp_customize ) {

		
		require get_template_directory() . '/inc/customizer-notify/goldy-mex-notify-section.php';

		$wp_customize->register_section_type( 'goldy_mex_Customizer_Notify_Section' );

		$wp_customize->add_section(
			new goldy_mex_Customizer_Notify_Section(
				$wp_customize,
				'goldy_mex-customizer-notify-section',
				array(
					'title'          => $this->recommended_actions_title,
					'plugin_text'    => $this->recommended_plugins_title,
					'dismiss_button' => $this->dismiss_button,
					'priority'       => 0,
				)
			)
		);

	}

	
	public function goldy_mex_customizer_notify_dismiss_recommended_action_callback() {

		global $goldy_mex_customizer_notify_recommended_actions;

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			
			if ( get_theme_mod( 'goldy_mex_customizer_notify_show' ) ) {

				$goldy_mex_customizer_notify_show_recommended_actions = get_theme_mod( 'goldy_mex_customizer_notify_show' );
				switch ( $_GET['todo'] ) {
					case 'add':
						$goldy_mex_customizer_notify_show_recommended_actions[ $action_id ] = true;
						break;
					case 'dismiss':
						$goldy_mex_customizer_notify_show_recommended_actions[ $action_id ] = false;
						break;
				}
				echo esc_html($goldy_mex_customizer_notify_show_recommended_actions);
				
			} else {
				$goldy_mex_customizer_notify_show_recommended_actions = array();
				if ( ! empty( $goldy_mex_customizer_notify_recommended_actions ) ) {
					foreach ( $goldy_mex_customizer_notify_recommended_actions as $goldy_mex_lite_customizer_notify_recommended_action ) {
						if ( $goldy_mex_lite_customizer_notify_recommended_action['id'] == $action_id ) {
							$goldy_mex_customizer_notify_show_recommended_actions[ $goldy_mex_lite_customizer_notify_recommended_action['id'] ] = false;
						} else {
							$goldy_mex_customizer_notify_show_recommended_actions[ $goldy_mex_lite_customizer_notify_recommended_action['id'] ] = true;
						}
					}
					echo esc_html($goldy_mex_customizer_notify_show_recommended_actions);
				}
			}
		}
		die(); 
	}

	
	public function goldy_mex_customizer_notify_dismiss_recommended_plugins_callback() {

		$action_id = ( isset( $_GET['id'] ) ) ? $_GET['id'] : 0;

		echo esc_html($action_id); 

		if ( ! empty( $action_id ) ) {

			$goldy_mex_lite_customizer_notify_show_recommended_plugins = get_theme_mod( 'goldy_mex_customizer_notify_show_recommended_plugins' );

			switch ( $_GET['todo'] ) {
				case 'add':
					$goldy_mex_lite_customizer_notify_show_recommended_plugins[ $action_id ] = false;
					break;
				case 'dismiss':
					$goldy_mex_lite_customizer_notify_show_recommended_plugins[ $action_id ] = true;
					break;
			}
			echo esc_html($goldy_mex_customizer_notify_show_recommended_actions);
		}
		die(); 
	}
}