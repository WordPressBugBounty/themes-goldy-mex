<?php
global $goldy_mex_themetype;
// Home Page Ordering Section
if (! is_plugin_active('slivery-extender/slivery-extender.php') ) {
	new \Kirki\Section(
		'global_ordering_section',
		[
			'title'       => esc_html__( 'Home Page Ordering Section', 'goldy-mex' ),
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
	
	Kirki::add_field( 'goldy_mex_recommand_ordering_activ_section', [
		'type'      => 'goldy-mex-gp-upsell-ordering-active',
		'settings'  => 'goldy_mex_recommand_ordering_activ_section',
		'text'  => $lablefore,
		'reg_url'  => $plugin_dir,
		'goldy_name'  => $goldy_mex_themetype['recommended_plugins_name'],
		'section'   => 'global_ordering_section',
	] );
}else{
	$pro_url = $goldy_mex_themetype['pro_section_custom_control'];
	Kirki::add_field( 'goldy_drag_drop_option_control', [
		'type'      	=> 'goldy-mex-gp-upsell-drag-drop-option',
		'settings'  	=> 'goldy_drag_drop_option_control',
		'text'  		=> 'Drag & Drop Section in ',
		'goldy_label'	=> $goldy_mex_themetype['recommended_plugins_name'],
		'reg_url'  		=> $pro_url,
		'section'   	=> 'global_ordering_section',
	] );
}
?>