<?php
/**
 * landed Theme Customizer
 *
 * @package landed
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function landed_customize_register($wp_customize) {
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';
	$wp_customize->get_setting('header_textcolor')->transport='postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial('blogname', array('selector'=> '.site-title a',
		'render_callback'=> 'landed_customize_partial_blogname',
		));
		$wp_customize->selective_refresh->add_partial('blogdescription', array('selector'=> '.site-description',
		'render_callback'=> 'landed_customize_partial_blogdescription',
		));
	}
}

add_action('customize_register', 'landed_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function landed_customize_partial_blogname() {
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function landed_customize_partial_blogdescription() {
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function landed_customize_preview_js() {
	wp_enqueue_script('landed-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}

add_action('customize_preview_init', 'landed_customize_preview_js');

/**
 * Kirki Customizer
 */
if(class_exists('Kirki')) {

	Kirki::add_config('landed_customizer', array('capability'=> 'edit_theme_options',
		'option_type'=> 'theme_mod',
		));

	Kirki::add_panel('landed_panel', array('priority'=> 50,
		'title'=> esc_html__('Landed Panel', 'landed'),
		'description'=> esc_html__('Landed Panel description', 'landed'),
		));

	Kirki::add_section('landed_section_1', array('title'=> esc_html__('Banner', 'landed'),
		'description'=> esc_html__('Banner description.', 'landed'),
		'panel'=> 'landed_panel',
		'priority'=> 10,
		));
	
	Kirki::add_field( 'landed_customizer', [
	'type'     => 'text',
	'settings' => 'banner_title',
	'label'    => esc_html__( 'Banner Title', 'landed' ),
	'section'  => 'landed_section_1',
	'default'  => esc_html__( 'The future has landed', 'landed' ),
	'priority' => 10,
	'partial_refresh'    => [
		'banner_title' => [
			'selector'        => '.banner-header-title',
			'render_callback' => function() {
				return get_theme_mod( 'banner_title' );
			},
		],
	],
] );
	
	Kirki::add_field( 'landed_customizer', [
	'type'     => 'textarea',
	'settings' => 'banner_description',
	'label'    => esc_html__( 'Banner Description', 'landed' ),
	'section'  => 'landed_section_1',
	'default'  => esc_html__( 'And there are no hoverboards or flying cars.Just apps. Lots of mother flipping apps.', 'landed' ),
	'partial_refresh'    => [
		'banner_description' => [
			'selector'        => '.banner-header .description',
			'render_callback' => function() {
				return get_theme_mod( 'banner_description' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'image',
	'settings'    => 'banner_image',
	'label'       => esc_html__( 'Banner Image', 'landed' ),
	'section'     => 'landed_section_1',
	'partial_refresh'    => [
		'banner_image' => [
			'selector'        => '#banner .image',
			'render_callback' => function() {
				return get_theme_mod( 'banner_image' );
			},
		],
	],
] );

// Section One (Spotlight)
Kirki::add_section('landed_section_2', array(
	'title'=> esc_html__('Section One', 'landed'),
		'description'=> esc_html__('Section One description.', 'landed'),
		'panel'=> 'landed_panel',
		'priority'=> 15,
		));	

	Kirki::add_field( 'landed_customizer', [
	'type'     => 'text',
	'settings' => 'section_one_title',
	'label'    => esc_html__( 'Section One Title', 'landed' ),
	'section'  => 'landed_section_2',
	'default'  => esc_html__( 'Odio faucibus ipsum integer consequat', 'landed' ),
	'priority' => 10,
	'partial_refresh'    => [
		'section_one_title' => [
			'selector'        => '#one header h2',
			'render_callback' => function() {
				return get_theme_mod( 'section_one_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'     => 'textarea',
	'settings' => 'section_one_description',
	'label'    => esc_html__( 'Section One Description', 'landed' ),
	'section'  => 'landed_section_2',
	'default'  => esc_html__( 'Nascetur eu nibh vestibulum amet gravida nascetur praesent', 'landed' ),
	'priority' => 11,
	'partial_refresh'    => [
		'section_one_description' => [
			'selector'        => '#one header p',
			'render_callback' => function() {
				return get_theme_mod( 'section_one_description' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'     => 'textarea',
	'settings' => 'section_one_content1',
	'label'    => esc_html__( 'Section One Content 1', 'landed' ),
	'section'  => 'landed_section_2',
	'default'  => esc_html__( 'Feugiat accumsan lorem eu ac lorem amet sed accumsan donec. Blandit orci porttitor semper. Arcu phasellus tortor enim mi nisi praesent dolor', 'landed' ),
	'priority' => 12,
	'partial_refresh'    => [
		'section_one_content1' => [
			'selector'        => '#one .col-12-medium.lft p',
			'render_callback' => function() {
				return get_theme_mod( 'section_one_content1' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'     => 'textarea',
	'settings' => 'section_one_content2',
	'label'    => esc_html__( 'Section One Content 2', 'landed' ),
	'section'  => 'landed_section_2',
	'default'  => esc_html__( 'Arcu phasellus tortor enim mi mi nisi praesent adipiscing. Integer mi sed nascetur cep aliquet augue varius tempus. Feugiat lorem ipsum dolor nullam.', 'landed' ),
	'priority' => 13,
	'partial_refresh'    => [
		'section_one_content2' => [
			'selector'        => '#one .col-12-medium p',
			'render_callback' => function() {
				return get_theme_mod( 'section_one_content2' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'image',
	'settings'    => 'section_one_image',
	'label'       => esc_html__( 'Section One Image', 'landed' ),
	'section'     => 'landed_section_1',
	'priority'=>15,
	'partial_refresh'    => [
		'section_one_image' => [
			'selector'        => '#one span.image',
			'render_callback' => function() {
				return get_theme_mod( 'section_one_image' );
			},
		],
	],
] );

// Section Two (Spotlight)
Kirki::add_section('landed_section_3', array(
	'title'=> esc_html__('Section Two', 'landed'),
		'description'=> esc_html__('Section Two description.', 'landed'),
		'panel'=> 'landed_panel',
		'priority'=> 20,
		));

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'image',
	'settings'    => 'section_two_image',
	'label'       => esc_html__( 'Section Two Image', 'landed' ),
	'section'     => 'landed_section_3',
	'priority'=>5,
	'partial_refresh'    => [
		'section_two_image' => [
			'selector'        => '#two .image',
			'render_callback' => function() {
				return get_theme_mod( 'section_two_image' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_two_title',
	'label'       => esc_html__( 'Section Two Title', 'landed' ),
	'section'     => 'landed_section_3',
	'priority'=>10,
	'default'=>__('Interdum amet non magna accumsan','landed'),
	'partial_refresh'    => [
		'section_two_title' => [
			'selector'        => '#two header h2',
			'render_callback' => function() {
				return get_theme_mod( 'section_two_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_two_subtitle',
	'label'       => esc_html__( 'Section Two Sub Title', 'landed' ),
	'section'     => 'landed_section_3',
	'priority'=>15,
	'default'=>__('Nunc commodo accumsan eget id nisi eu col volutpat magna','landed'),
	'partial_refresh'    => [
		'section_two_subtitle' => [
			'selector'        => '#two header p',
			'render_callback' => function() {
				return get_theme_mod( 'section_two_subtitle' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_two_description',
	'label'       => esc_html__( 'Section Two description', 'landed' ),
	'section'     => 'landed_section_3',
	'priority'=>20,
	'default'=>__('Feugiat accumsan lorem eu ac lorem amet ac arcu phasellus tortor enim mi mi nisi praesent adipiscing. Integer mi sed nascetur cep aliquet augue varius tempus lobortis porttitor lorem et accumsan consequat adipiscing lorem','landed'),
	'partial_refresh'    => [
		'section_two_description' => [
			'selector'        => '#two .content > p',
			'render_callback' => function() {
				return get_theme_mod( 'section_two_description' );
			},
		],
	],
] );
	
Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_two_button',
	'label'       => esc_html__( 'Section Two Button Label', 'landed' ),
	'section'     => 'landed_section_3',
	'priority'=>25,
	'default'=>__('Feugiat','landed'),
	'partial_refresh'    => [
		'section_two_button' => [
			'selector'        => '#two .actions li>a',
			'render_callback' => function() {
				return get_theme_mod( 'section_two_button' );
			},
		],
	],
] );
	
Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_two_button_url',
	'label'       => esc_html__( 'Section Two Button URL', 'landed' ),
	'section'     => 'landed_section_3',
	'priority'=>30,
	'default'=>'#',
	'transport'=>'postMessage',
] );

// Section Three (Spotlight)
Kirki::add_section('landed_section_4', array(
	'title'=> esc_html__('Section Three', 'landed'),
		'description'=> esc_html__('Section Three description.', 'landed'),
		'panel'=> 'landed_panel',
		'priority'=> 25,
		));

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'image',
	'settings'    => 'section_three_image',
	'label'       => esc_html__( 'Section Three Image', 'landed' ),
	'section'     => 'landed_section_4',
	'priority'=>5,
	'partial_refresh'    => [
		'section_three_image' => [
			'selector'        => '#three .image',
			'render_callback' => function() {
				return get_theme_mod( 'section_three_image' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_three_title',
	'label'       => esc_html__( 'Section Three Title', 'landed' ),
	'section'     => 'landed_section_4',
	'priority'=>10,
	'default'=>__('Interdum amet non magna accumsan','landed'),
	'partial_refresh'    => [
		'section_three_title' => [
			'selector'        => '#three header h2',
			'render_callback' => function() {
				return get_theme_mod( 'section_three_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_three_subtitle',
	'label'       => esc_html__( 'Section Three Sub Title', 'landed' ),
	'section'     => 'landed_section_4',
	'priority'=>15,
	'default'=>__('Nunc commodo accumsan eget id nisi eu col volutpat magna','landed'),
	'partial_refresh'    => [
		'section_three_subtitle' => [
			'selector'        => '#three header p',
			'render_callback' => function() {
				return get_theme_mod( 'section_three_subtitle' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_three_description',
	'label'       => esc_html__( 'Section Three description', 'landed' ),
	'section'     => 'landed_section_4',
	'priority'=>20,
	'default'=>__('Feugiat accumsan lorem eu ac lorem amet ac arcu phasellus tortor enim mi mi nisi praesent adipiscing. Integer mi sed nascetur cep aliquet augue varius tempus lobortis porttitor lorem et accumsan consequat adipiscing lorem','landed'),
	'partial_refresh'    => [
		'section_three_description' => [
			'selector'        => '#three .content > p',
			'render_callback' => function() {
				return get_theme_mod( 'section_three_description' );
			},
		],
	],
] );
	
Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_three_button',
	'label'       => esc_html__( 'Section Three Button Label', 'landed' ),
	'section'     => 'landed_section_4',
	'priority'=>25,
	'default'=>__('Feugiat','landed'),
	'partial_refresh'    => [
		'section_three_button' => [
			'selector'        => '#three .actions li>a',
			'render_callback' => function() {
				return get_theme_mod( 'section_three_button' );
			},
		],
	],
] );
	
Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_three_button_url',
	'label'       => esc_html__( 'Section Three Button URL', 'landed' ),
	'section'     => 'landed_section_4',
	'priority'=>30,
	'default'=>'#',
	'transport'=>'postMessage',
] );


// Section Four
Kirki::add_section('landed_section_5', array(
	'title'=> esc_html__('Section Four', 'landed'),
		'description'=> esc_html__('Section Four description.', 'landed'),
		'panel'=> 'landed_panel',
		'priority'=> 35,
		));


	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_title',
	'label'       => esc_html__( 'Section Four Title', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=>5,
	'default'=>__('Accumsan sed tempus adipiscing blandit', 'landed'),
	'partial_refresh'    => [
		'section_four_title' => [
			'selector'        => '#four .major h2',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_four_subtitle',
	'label'       => esc_html__( 'Section Four Subtitle', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 10,
	'default'=>__('Accumsan sed tempus adipiscing blandit sed tempus adipiscing blandit', 'landed'),
	'partial_refresh'    => [
		'section_four_subtitle' => [
			'selector'        => '#four .major p',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_subtitle' );
			},
		],
	],
] );

Kirki::add_field( 'landed_customizer', array(
	'type'        => 'fontawesome',
	'settings'    => 'section_four_box1_icon',
	'label'       => esc_attr__( 'Font Awesome (Icons))', 'kirki' ),
	'section'     => 'landed_section_5',
	'default'     => 'comment',
	'priority'=>13,
) );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_box1_title',
	'label'       => esc_html__( 'Section Four Box Title', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 15,
	'default' => __('Ipsum sed commodo', 'landed'),
	'partial_refresh'    => [
		'section_four_box1_title' => [
			'selector'        => '#four .box #box1_title',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box1_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_four_box1_subtitle',
	'label'       => esc_html__( 'Section Four Box Subtitle', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 20,
	'default' => __('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor', 'landed'),
	'partial_refresh'    => [
		'section_four_box1_subtitle' => [
			'selector'        => '#four .box #box1_title + p',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box1_subtitle' );
			},
		],
	],
] );

Kirki::add_field( 'landed_customizer', array(
	'type'        => 'fontawesome',
	'settings'    => 'section_four_box2_icon',
	'label'       => esc_attr__( 'Font Awesome (Icons))', 'kirki' ),
	'section'     => 'landed_section_5',
	'default'     => 'comment',
	'priority'=>23,
) );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_box2_title',
	'label'       => esc_html__( 'Section Four Box 2 Title', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 25,
	'default' => __('Ipsum sed commodo', 'landed'),
	'partial_refresh'    => [
		'section_four_box2_title' => [
			'selector'        => '#four .box #box2_title',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box2_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_four_box2_subtitle',
	'label'       => esc_html__( 'Section Four Box 2 Subtitle', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 30,
	'default' => __('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor', 'landed'),
	'partial_refresh'    => [
		'section_four_box2_subtitle' => [
			'selector'        => '#four .box #box2_title + p',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box2_subtitle' );
			},
		],
	],
] );

Kirki::add_field( 'landed_customizer', array(
	'type'        => 'fontawesome',
	'settings'    => 'section_four_box3_icon',
	'label'       => esc_attr__( 'Font Awesome (Icons))', 'kirki' ),
	'section'     => 'landed_section_5',
	'default'     => 'comment',
	'priority'=>33,
) );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_box3_title',
	'label'       => esc_html__( 'Section Four Box 3 Title', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 35,
	'default' => __('Ipsum sed commodo', 'landed'),
	'partial_refresh'    => [
		'section_four_box3_title' => [
			'selector'        => '#four .box #box3_title',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box3_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_four_box3_subtitle',
	'label'       => esc_html__( 'Section Four Box 3 Subtitle', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 40,
	'default' => __('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor', 'landed'),
	'partial_refresh'    => [
		'section_four_box3_subtitle' => [
			'selector'        => '#four .box #box3_title + p',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box3_subtitle' );
			},
		],
	],
] );

Kirki::add_field( 'landed_customizer', array(
	'type'        => 'fontawesome',
	'settings'    => 'section_four_box4_icon',
	'label'       => esc_attr__( 'Font Awesome (Icons))', 'kirki' ),
	'section'     => 'landed_section_5',
	'default'     => 'comment',
	'priority'=>43,
) );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_box4_title',
	'label'       => esc_html__( 'Section Four Box 4 Title', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 45,
	'default' => __('Ipsum sed commodo', 'landed'),
	'partial_refresh'    => [
		'section_four_box4_title' => [
			'selector'        => '#four .box #box4_title',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box4_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_four_box4_subtitle',
	'label'       => esc_html__( 'Section Four Box 4 Subtitle', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 50,
	'default' => __('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor', 'landed'),
	'partial_refresh'    => [
		'section_four_box4_subtitle' => [
			'selector'        => '#four .box #box4_title + p',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box4_subtitle' );
			},
		],
	],
] );

Kirki::add_field( 'landed_customizer', array(
	'type'        => 'fontawesome',
	'settings'    => 'section_four_box5_icon',
	'label'       => esc_attr__( 'Font Awesome (Icons))', 'kirki' ),
	'section'     => 'landed_section_5',
	'default'     => 'comment',
	'priority'=>53,
) );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_box5_title',
	'label'       => esc_html__( 'Section Four Box 5 Title', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 55,
	'default' => __('Ipsum sed commodo', 'landed'),
	'partial_refresh'    => [
		'section_four_box5_title' => [
			'selector'        => '#four .box #box5_title',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box5_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_four_box5_subtitle',
	'label'       => esc_html__( 'Section Four Box 5 Subtitle', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 60,
	'default' => __('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor', 'landed'),
	'partial_refresh'    => [
		'section_four_box5_subtitle' => [
			'selector'        => '#four .box #box5_title + p',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box5_subtitle' );
			},
		],
	],
] );

Kirki::add_field( 'landed_customizer', array(
	'type'        => 'fontawesome',
	'settings'    => 'section_four_box6_icon',
	'label'       => esc_attr__( 'Font Awesome (Icons))', 'kirki' ),
	'section'     => 'landed_section_5',
	'default'     => 'comment',
	'priority'=>63,
) );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_box6_title',
	'label'       => esc_html__( 'Section Four Box 6 Title', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 65,
	'default' => __('Ipsum sed commodo', 'landed'),
	'partial_refresh'    => [
		'section_four_box6_title' => [
			'selector'        => '#four .box #box6_title',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box6_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_four_box6_subtitle',
	'label'       => esc_html__( 'Section Four Box 6 Subtitle', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 70,
	'default' => __('Feugiat accumsan lorem eu ac lorem amet accumsan donec. Blandit orci porttitor', 'landed'),
	'partial_refresh'    => [
		'section_four_box6_subtitle' => [
			'selector'        => '#four .box #box6_title + p',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_box6_subtitle' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_button_label',
	'label'       => esc_html__( 'Section Four Button Label', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 75,
	'default' => __('Magna sed feugiat', 'landed'),
	'partial_refresh'    => [
		'section_four_button_label' => [
			'selector'        => '#four .actions li>a.button',
			'render_callback' => function() {
				return get_theme_mod( 'section_four_button_label' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_four_button_url',
	'label'       => esc_html__( 'Section Four Button Url', 'landed' ),
	'section'     => 'landed_section_5',
	'priority'=> 80,
	'default' => __('#', 'landed'),
	// 'partial_refresh'    => [
	// 	'section_four_button_label' => [
	// 		'selector'        => '#four .actions li>a.button',
	// 		'render_callback' => function() {
	// 			return get_theme_mod( 'section_four_button_label' );
	// 		},
	// 	],
	//],
] );


// Section Four
Kirki::add_section('landed_section_6', array(
	'title'=> esc_html__('Section Five', 'landed'),
		'description'=> esc_html__('Section Five description.', 'landed'),
		'panel'=> 'landed_panel',
		'priority'=> 40,
		));

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'text',
	'settings'    => 'section_five_title',
	'label'       => esc_html__( 'Section Five Title', 'landed' ),
	'section'     => 'landed_section_6',
	'priority'=>5,
	'default'=>__('Accumsan sed tempus adipiscing blandit', 'landed'),
	'partial_refresh'    => [
		'section_five_title' => [
			'selector'        => '#five #five-header h2',
			'render_callback' => function() {
				return get_theme_mod( 'section_five_title' );
			},
		],
	],
] );

	Kirki::add_field( 'landed_customizer', [
	'type'        => 'textarea',
	'settings'    => 'section_five_subtitle',
	'label'       => esc_html__( 'Section Five Subtitle', 'landed' ),
	'section'     => 'landed_section_6',
	'priority'=> 10,
	'default'=>__('Accumsan sed tempus adipiscing blandit sed tempus adipiscing blandit', 'landed'),
	'partial_refresh'    => [
		'section_five_subtitle' => [
			'selector'        => '#five #five-header p',
			'render_callback' => function() {
				return get_theme_mod( 'section_five_subtitle' );
			},
		],
	],
] );


Kirki::add_field( 'landed_customizer', [
	'type'        => 'code',
	'settings'    => 'section_five_eform',
	'label'       => esc_html__( 'Section Five Email FormCode Control', 'landed' ),
	'description' => esc_html__( 'Add mailchimp or similar plugin\'s Shortcode Here for generating subscription form', 'landed' ),
	'section'     => 'landed_section_6',
	'default'     => '',
	'choices'     => [
		'language' => 'html',
	],
	'partial_refresh'    => [
		'section_five_eform' => [
			'selector'        => '#five #email',
			'render_callback' => function() {
				return get_theme_mod( 'section_five_eform' );
			},
		],
	],
] );


Kirki::add_panel('landed_layout_panel', array('priority'=> 150,
		'title'=> esc_html__('Landed Layout Panel', 'landed'),
		'description'=> esc_html__('Landed Layout Panel description', 'landed'),
		));

	Kirki::add_section('landed_layout_section_1', array('title'=> esc_html__('Layout', 'landed'),
		'description'=> esc_html__('Layout description.', 'landed'),
		'panel'=> 'landed_layout_panel',
		'priority'=> 5,
		));

	Kirki::add_field( 'landed_customizer', [
	'type'     => 'radio',
	'settings' => 'layout_option1',
	'label'    => esc_html__( 'Sidebar', 'landed' ),
	'section'  => 'layout_section_1',
	'priority' => 5,
	'default'=>'no_sidebar',
	'choices'=>[
		'no_sidebar'=>esc_html__('No Sidebar', 'landed'),
		'left_sidebar'=>esc_html__('Left Sidebar', 'landed'),
		'right_sidebar'=>esc_html__('Right Sidebar', 'landed'),
		'both_sidebar'=>esc_html__('Both Sidebar', 'landed'),
	],
	// 'partial_refresh'    => [
	// 	'banner_title' => [
	// 		'selector'        => '.banner-header-title',
	// 		'render_callback' => function() {
	// 			return get_theme_mod( 'banner_title' );
	// 		},
	// 	],
	// ],
] );

}