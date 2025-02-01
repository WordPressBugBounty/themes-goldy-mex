<?php
global $goldy_mex_themetype;
// Funfact Section
new \Kirki\Section(
	'funfact_section',
	[
		'title'       => esc_html__( 'Funfact Section', 'goldy-mex' ),
		'panel'       => 'globly_theme_option',
		'priority'    => 150,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'goldy_funfact_section_main_title',
		'label'    => esc_html__( 'Funfact Section Title', 'goldy-mex' ),
		'section'  => 'funfact_section',
		'default'  => esc_html__( 'Funfact Section', 'goldy-mex' ),
		'priority' => 5,
	]
);

new \Kirki\Field\Text(
	[
		'settings' => 'goldy_funfact_section_description',
		'label'    => esc_html__( 'Funfact Section Discription', 'goldy-mex' ),
		'section'  => 'funfact_section',
		'default'  => esc_html__( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'goldy-mex' ),
		'priority' => 10,
	]
);
	
new \Kirki\Field\Repeater(
	[
		'settings' => 'goldy_mex_funfact_section_content',
		'label'    => esc_html__( 'Funfact Items Content', 'goldy-mex' ),
		'row_label' => array( 'value' => 'Info item' ),
		'section'  => 'funfact_section',
		'priority' => 15,
		'default'  => [
			[
				'icon_value'    => 'fa-thumbs-up',
				'title'    => 'Funfact title 1',
				'text'    => 'this is featured.',
			],
			[
				'icon_value'    => 'fa-smile-o',
				'title'    => 'Funfact title 2',
				'text'    => 'this is featured.',
			],
			[
				'icon_value'    => 'fa-black-tie',
				'title'    => 'Funfact title 3',
				'text'    => 'this is featured.',	
			],
			[
				'icon_value'    => 'fa-users',
				'title'    => 'Funfact title 4',
				'text'    => 'this is featured.',
			],
		],
		'fields'   => [
			'icon_value'    => [
				'type'		  => 'text',
				'label'       => esc_html__( 'Icon:', 'goldy-mex' ),
				'description' => sprintf(
					esc_html__('Note: Some icons may not be displayed here. You can see the full list of icons at %1$s.', 'goldy-mex' ),
					sprintf( '<a href="'.esc_url('https://fontawesome.com/v4/icons/').'" rel="nofollow">%s</a>', esc_html__( 'http://fontawesome.io/icons/', 'goldy-mex' ) )
				),
			],
			'title'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'goldy-mex' ),
			],
			'text'    => [
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'goldy-mex' ),
			],
		],
		'partial_refresh'    => [
			'goldy_funfact_section_main_title' => [
				'selector'        => '.goldy_mex_funfact_section',
				'render_callback' => function() {
				    return get_theme_mod('goldy_mex_funfact_section_content');
				}
			],
		],
		'choices' => [
			'limit' => ($goldy_mex_themetype['themtypeis']=='normal') ? 4 : 100,
		]
	]
);

if(isset($goldy_mex_themetype['goldy_funfact_section_icon_size'])){
	new \Kirki\Field\Text(
		[
			'settings' => 'goldy_funfact_section_icon_size',
			'label'    => esc_html__( 'Icon Size', 'goldy-mex' ),
			'description' => esc_html__( 'in px', 'goldy-mex' ),
			'section'  => 'funfact_section',
			'priority'    => 20,
			'default'  => $goldy_mex_themetype['goldy_funfact_section_icon_size'],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_icon_size_element'],
					'property' => 'font-size',
				),
			),
		]
	);
}
new \Kirki\Field\Image(
	[
		'settings'    => 'goldy_funfact_section_bg_image',
		'label'       => esc_html__( 'Backgroung Image', 'goldy-mex' ),
		'section'     => 'funfact_section',
		'default'     => '',
		'priority'    => 25,
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'goldy_funfact_section_background_position',
		'label'       => esc_html__( 'Background Position', 'goldy-mex' ),
		'section'     => 'funfact_section',
		'default'     => 'center center',
		'placeholder' => esc_html__( 'Choose an option', 'goldy-mex' ),
		'priority'    => 30,
		'choices'     => [
			'left top' => esc_html__( 'Left Top', 'goldy-mex' ),
			'left center' => esc_html__( 'Left Center', 'goldy-mex' ),
			'left bottom' => esc_html__( 'Left Bottom', 'goldy-mex' ),
			'right top' => esc_html__( 'Right Top', 'goldy-mex' ),
			'right center' => esc_html__( 'Right Center', 'goldy-mex' ),
			'right bottom' => esc_html__( 'Right Bottom', 'goldy-mex' ),
			'center top' => esc_html__( 'Center Top', 'goldy-mex' ),
			'center center' => esc_html__( 'Center Center', 'goldy-mex' ),
			'center bottom' => esc_html__( 'Center Bottom', 'goldy-mex' ),
		],
		'output' => array(
			array(
				'element'  => '.goldy_mex_funfact_section',
				'property' => 'background-position',
				'suffix' => '!important',
			),
		),
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'goldy_funfact_section_background_attachment',
		'label'       => esc_html__( 'Background Attachment', 'goldy-mex' ),
		'section'     => 'funfact_section',
		'default'     => 'scroll',
		'priority'    => 35,
		'placeholder' => esc_html__( 'Choose an option', 'goldy-mex' ),
		'choices'     => [
			'scroll' => esc_html__( 'Scroll', 'goldy-mex' ),
			'fixed' => esc_html__( 'Fixed', 'goldy-mex' ),
		],
		'output' => array(
			array(
				'element'  => '.goldy_mex_funfact_section',
				'property' => 'background-attachment',
				'suffix' => '!important',
			),
		),
	]
);

new \Kirki\Field\Select(
	[
		'settings'    => 'goldy_funfact_section_background_size',
		'label'       => esc_html__( 'Background Size', 'goldy-mex' ),
		'section'     => 'funfact_section',
		'default'     => 'cover',
		'priority'    => 40,
		'placeholder' => esc_html__( 'Choose an option', 'goldy-mex' ),
		'choices'     => [
			'auto' => esc_html__( 'Auto', 'goldy-mex' ),
			'cover' => esc_html__( 'Cover', 'goldy-mex' ),
			'contain' => esc_html__( 'Contain', 'goldy-mex' ),
		],
		'output' => array(
			array(
				'element'  => '.goldy_mex_funfact_section',
				'property' => 'background-size',
				'suffix' => '!important',
			),
		),
	]
);

if(isset($goldy_mex_themetype['goldy_funfact_section_bg_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_bg_color',
			'label'       => __( 'Background Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_bg_color'],
			'priority'    => 45,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => '.goldy_mex_funfact_section',
					'property' => 'background',
				),
			),
		]
	);
}

if(isset($goldy_mex_themetype['goldy_funfact_section_text_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_text_color',
			'label'       => __( 'Text Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_text_color'],
			'priority'    => 50,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_text_color_element'],
					'property' => 'color',
				),
			),
		]
	);
}

if(isset($goldy_mex_themetype['goldy_funfact_section_contain_bg_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_contain_bg_color',
			'label'       => __( 'Contain Background Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_contain_bg_color'],
			'priority'    => 55,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_contain_bg_color_element'],
					'property' => 'background-color',
				),
			),
		]
	);
}

if(isset($goldy_mex_themetype['goldy_funfact_section_bg_hover_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_bg_hover_color',
			'label'       => __( 'Contain Background Hover Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_bg_hover_color'],
			'priority'    => 60,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_bg_hover_color_element'],
					'property' => 'background-color',
				),
			),
		]
	);
}

if(isset($goldy_mex_themetype['goldy_funfact_section_contain_text_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_contain_text_color',
			'label'       => __( 'Contain Text Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_contain_text_color'],
			'priority'    => 65,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_contain_text_color_element'],
					'property' => 'color',
				),
			),
		]
	);
}

if(isset($goldy_mex_themetype['goldy_funfact_section_contain_text_hover_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_contain_text_hover_color',
			'label'       => __( 'Contain Text Hover Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_contain_text_hover_color'],
			'priority'    => 70,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_contain_text_hover_color_element'],
					'property' => 'color',
				),
			),
		]
	);
}

if(isset($goldy_mex_themetype['goldy_funfact_section_icon_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_icon_color',
			'label'       => __( 'Icon Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_icon_color'],
			'priority'    => 75,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_icon_color_element'],
					'property' => 'color',
				),
			),
		]
	);
}

if(isset($goldy_mex_themetype['goldy_funfact_section_icon_hover_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_icon_hover_color',
			'label'       => __( 'Icon Hover Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_icon_hover_color'],
			'priority'    => 80,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_icon_hover_color_element'],
					'property' => 'color',
				),
			),
		]
	);
}

if(isset($goldy_mex_themetype['goldy_funfact_section_border_color'])){
	new \Kirki\Field\Color(
		[
			'settings'    => 'goldy_funfact_section_border_color',
			'label'       => __( 'Border Color', 'goldy-mex' ),
			'section'     => 'funfact_section',
			'default'     => $goldy_mex_themetype['goldy_funfact_section_border_color'],
			'priority'    => 85,
			'choices'     => [
				'alpha' => true,
			],
			'output' => array(
				array(
					'element'  => $goldy_mex_themetype['goldy_funfact_section_border_color_element'],
					'property' => $goldy_mex_themetype['goldy_funfact_section_border_color_property'],
				),
			),
		]
	);
}