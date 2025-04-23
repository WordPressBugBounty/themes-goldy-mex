<?php
global $goldy_mex_themetype;
// Our Testimonial Section
if (! is_plugin_active('slivery-extender/slivery-extender.php') ) {
	new \Kirki\Section(
		'our_testimonial_section',
		[
			'title'       => esc_html__( 'Our Testimonial', 'goldy-mex' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	$slug='slivery-extender';
	
	$all_plugins = get_plugins();
	if( !array_key_exists( $slug. '/'.$slug.'.php', $all_plugins ) ){
		$plugin_dir=add_query_arg(
			array(
				'action'        => 'install-plugin',
				'plugin'        => rawurlencode( $slug ),
				'plugin_status' => 'all',
				'paged'         => '1',
				'_wpnonce'      => wp_create_nonce( 'install-plugin_' . $slug  ),
			), network_admin_url( 'update.php' )
		);
		$lablefore='Install';
	}else{
		$plugin_dir=add_query_arg(
			array(
				'action'        => 'activate',
				'plugin'        => rawurlencode( $slug . '/' . $slug . '.php' ),
				'plugin_status' => 'all',
				'paged'         => '1',
				'_wpnonce'      => wp_create_nonce( 'activate-plugin_' . $slug . '/' . $slug . '.php' ),
			), network_admin_url( 'plugins.php' )
		);
		$lablefore='Active';
	}
	
	Kirki::add_field( 'goldy_mex_recommand_our_testminial_activ_section', [
		'type'      => 'goldy-mex-gp-upsell-ourtestminial-active',
		'settings'  => 'goldy_mex_recommand_our_testminial_activ_section',
		'text'  => $lablefore,
		'reg_url'  => $plugin_dir,
		'goldy_name'  => $goldy_mex_themetype['recommended_plugins_name'],
		'section'   => 'our_testimonial_section',
	] );
}
?>