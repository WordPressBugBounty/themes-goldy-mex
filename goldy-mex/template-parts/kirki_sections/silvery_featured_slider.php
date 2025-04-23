<?php
// add_action('init',"wpb_load_files",99);
// function wpb_load_files(){
global $goldy_mex_themetype;
if (! function_exists( 'kirki' )) {
    return;
}

// Theme Option
	new \Kirki\Panel(
		'globly_theme_option',
		[
			'priority'    => 10,
			'title'       => esc_html__( 'Theme Option', 'goldy-mex' ),
		]
	);

// Featured Slider Section
	new \Kirki\Section(
		'featured_slider_section',
		[
			'title'       => esc_html__( 'Featured Slider', 'goldy-mex' ),
			'panel'       => 'globly_theme_option',
			'priority'    => 160,
		]
	);

	new \Kirki\Field\Repeater(
		[
			'settings' => 'goldy_mex_featuredimage_slider',
			'label'    => esc_html__( 'Featured Slider Items Content', 'goldy-mex' ),
			'row_label' => array( 'value' => 'Slider item' ),
			'section'  => 'featured_slider_section',
			'priority' => 10,
			'default'  => [
				[
					'image'    => '',
					'title'    => esc_html__('New Skills', 'goldy-mex' ),
					'text'    => esc_html__('Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'goldy-mex' ),
					'link_url'    => esc_html__('#', 'goldy-mex' ),
					'link_text'   => esc_html__( 'Button', 'goldy-mex' ),
				],
			],
			'fields'   => [
				'image'    => [
					'type'		  => 'image',
					'label'       => esc_html__( 'Image:', 'goldy-mex' ),
				],
				'title'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Title', 'goldy-mex' ),
				],
				'text'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Text', 'goldy-mex' ),
				],
				'link_url'    => [
					'type'        => 'text',
					'label'       => esc_html__( 'Link URL', 'goldy-mex' ),
				],
				'link_text'   => [
					'type'        => 'text',
					'label'       => esc_html__( 'Button text:', 'goldy-mex' ),
				],
			],
			'partial_refresh'    => [
				'goldy_mex_featuredimage_slider' => [
					'selector'        => '.featured_slider_image',
					'render_callback' => function() {
					    return get_theme_mod('goldy_mex_featuredimage_slider');
					}
				],
			],
			'choices' => [
				'limit' => ($goldy_mex_themetype['themtypeis']=='normal') ? 1 : 100,
			]
		]
	);

	// Slider Design 
		if(isset($goldy_mex_themetype['silvery_featured_slider_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_text_color',
					'label'       => __( 'Text Color', 'goldy-mex' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 20,
					'default'     => $goldy_mex_themetype['silvery_featured_slider_text_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_disc, .featured_slider_title h1',
							'property' => 'color',
						),
					),
				]
			);
		}

		if(isset($goldy_mex_themetype['silvery_featured_slider_arrow_text_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_arrow_text_color',
					'label'       => __( 'Arrow Text Color', 'goldy-mex' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 30,
					'default'     => $goldy_mex_themetype['silvery_featured_slider_arrow_text_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_image .owl-nav button',
							'property' => 'color',
							'suffix'  => '!important',
						),
					),
				]
			);
		}

		if(isset($goldy_mex_themetype['silvery_featured_slider_arrow_bg_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_arrow_bg_color',
					'label'       => __( 'Arrow Background Color', 'goldy-mex' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 40,
					'default'     => $goldy_mex_themetype['silvery_featured_slider_arrow_bg_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_image .owl-nav button',
							'property' => 'background',
							'suffix'  => '!important',
						),
					),
				]
			);
		}

		if(isset($goldy_mex_themetype['silvery_featured_slider_arrow_text_hover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_arrow_text_hover_color',
					'label'       => __( 'Arrow Text Hover Color', 'goldy-mex' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 50,
					'default'     => $goldy_mex_themetype['silvery_featured_slider_arrow_text_hover_color'],
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_image button.owl-prev:hover, .featured_slider_image button.owl-next:hover',
							'property' => 'color',
							'suffix'  => '!important',
						),
					),
				]
			);
		}

		if(isset($goldy_mex_themetype['silvery_featured_slider_arrow_bg_hover_color'])){
			new \Kirki\Field\Color(
				[
					'settings'    => 'silvery_featured_slider_arrow_bg_hover_color',
					'label'       => __( 'Arrow Background Hover Color', 'goldy-mex' ),
					'section'     => 'featured_slider_section',
					'priority' 	  => 60,
					'default'     => $goldy_mex_themetype['silvery_featured_slider_arrow_bg_hover_color'],
					// 'default'     => '#4f2d4f',
					'choices'     => [
						'alpha' => true,
					],
					'output' => array(
						array(
							'element'  => '.featured_slider_image button.owl-prev:hover, .featured_slider_image button.owl-next:hover',
							'property' => 'background',
							'suffix'  => '!important',
						),
					),
				]
			);
		}

		new \Kirki\Field\Select(
			[
				'settings'    => 'silvery_featured_slider_autoplay',
				'label'       => esc_html__( 'Autoplay', 'goldy-mex' ),
				'section'     => 'featured_slider_section',
				'priority' 	  => 70,
				'default'     => 'true',
				'placeholder' => esc_html__( 'Choose an option', 'goldy-mex' ),
				'choices'     => [
					'true' => esc_html__( 'True', 'goldy-mex' ),
					'false' => esc_html__( 'False', 'goldy-mex' ),
				],
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => 'silvery_featured_slider_autoplay_speed',
				'label'    => esc_html__( 'AutoplaySpeed', 'goldy-mex' ),
				'section'  => 'featured_slider_section',
				'default'  => esc_html__( '1000', 'goldy-mex' ),
				'priority' => 80,
			]
		);

		new \Kirki\Field\Number(
			[
				'settings' => 'silvery_featured_slider_autoplay_timeout',
				'label'    => esc_html__( 'AutoplayTimeout', 'goldy-mex' ),
				'section'  => 'featured_slider_section',
				'default'  => esc_html__( '5000', 'goldy-mex' ),
				'priority' => 90,
			]
		);

?>