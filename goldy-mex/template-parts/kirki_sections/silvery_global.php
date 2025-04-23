<?php
global $goldy_mex_themetype;
// Global Section
	new \Kirki\Panel(
		'global_option',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Global', 'goldy-mex' ),
			
		]
	);

// Buttons
	new \Kirki\Section(
		'button_section',
		[
			'title'       => esc_html__( 'Buttons', 'goldy-mex' ),
			'panel'       => 'global_option',
			'priority'    => 160,
		]
	);

	if(isset($goldy_mex_themetype['button_bg_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'goldy_mex_button_bg_color',
				'label'       => __( 'Button Background Color', 'goldy-mex' ),
				'section'     => 'button_section',
				'default'     => $goldy_mex_themetype['button_bg_color'],
				// 'default'     => '#f6ad15',
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $goldy_mex_themetype['button_bg_color_element'],
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($goldy_mex_themetype['_button_bg_hover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'goldy_mex_button_bg_hover_color',
				'label'       => __( 'Background Hover Color', 'goldy-mex' ),
				'section'     => 'button_section',
				'default'     => $goldy_mex_themetype['_button_bg_hover_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $goldy_mex_themetype['_button_bg_hover_color_element'],
						'property' => 'background-color',
					),
				),
			]
		);
	}

	if(isset($goldy_mex_themetype['_button_text_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'goldy_mex_button_text_color',
				'label'       => __( 'Button Text Color', 'goldy-mex' ),
				'section'     => 'button_section',
				'default'     => $goldy_mex_themetype['_button_text_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $goldy_mex_themetype['_button_text_color_element'],
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($goldy_mex_themetype['_button_texthover_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'goldy_mex_button_texthover_color',
				'label'       => __( 'Button Text Hover Color', 'goldy-mex' ),
				'section'     => 'button_section',
				'default'     => $goldy_mex_themetype['_button_texthover_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $goldy_mex_themetype['_button_texthover_color_element'],
						'property' => 'color',
					),
				),
			]
		);
	}

	if(isset($goldy_mex_themetype['_button_border_color'])){
		new \Kirki\Field\Color(
			[
				'settings'    => 'goldy_mex_button_border_color',
				'label'       => __( 'Border Color', 'goldy-mex' ),
				'section'     => 'button_section',
				'default'     => $goldy_mex_themetype['_button_border_color'],
				'choices'     => [
					'alpha' => true,
				],
				'output' => array(
					array(
						'element'  => $goldy_mex_themetype['_button_border_color_element'],
						'property' => 'border-color',
						'suffix'  => ' !important'
					),
				),
			]
		);
	}

	new \Kirki\Field\Text(
		[
			'settings' => 'goldy_mex_borderwidth','goldy_mex_button_border_color',
			'label'    => esc_html__( 'Border Width', 'goldy-mex' ),
			'description' => esc_html__( 'in px', 'goldy-mex' ),
			'section'     => 'button_section',
			'default'  => '1px solid',
			'output' => array(
				array(
					'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
					'property' => 'border',
				),
			),
		]
	);

	new \Kirki\Field\Dimension(
		[
			'settings'    => 'goldy_mex_button_border_radius',
			'label'       => esc_html__( 'Border Radius', 'goldy-mex' ),
			'description' => esc_html__( 'in px', 'goldy-mex' ),
			'section'     => 'button_section',
			'default'     => '4px',
			'choices'     => [
				'accept_unitless' => true,
			],
			'output' => array(
				array(
					'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
					'property' => 'border-radius',
				),
			),
		]
	);

	new \Kirki\Field\Text(
		[
			'settings' => 'goldy_mex_button_padding',
			'label'    => esc_html__( 'Button Padding', 'goldy-mex' ),
			'description' => esc_html__( '8px 15px', 'goldy-mex' ),
			'section'     => 'button_section',
			'default'  => esc_html__( '8px 15px', 'goldy-mex' ),
			'output' => array(
				array(
					'element'  => 'button, input[type="button"], input[type="reset"], input[type="submit"], .wp-block-search .wp-block-search__button,.nav-previous a, .nav-next a, .buttons, .woocommerce a.button , .woocommerce button, .woocommerce .single-product button, .woocommerce button.button.alt, .woocommerce a.button.alt, .woocommerce button.button.alt.disabled',
					'property' => 'padding',
				),
			),
		]
	);
?>