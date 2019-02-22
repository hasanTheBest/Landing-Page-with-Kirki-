<?php
/**
 * landed functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package landed
 */

require_once get_theme_file_path('lib/class-kirki-installer-section.php');

if ( ! function_exists( 'landed_setup' ) ) : 
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function landed_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on landed, use a find and replace
		 * to change 'landed' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'landed', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'landed' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'landed_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'landed_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function landed_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'landed_content_width', 640 );
}
add_action( 'after_setup_theme', 'landed_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function landed_widgets_init() {

	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Sidebar', 'landed' ),
	// 	'id'            => 'sidebar-1',
	// 	'description'   => esc_html__( 'Add widgets here.', 'landed' ),
	// 	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</section>',
	// 	'before_title'  => '<h2 class="widget-title">',
	// 	'after_title'   => '</h2>',
	// ) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Social', 'landed' ),
		'id'            => 'landed_footer_social',
		'description'   => esc_html__( 'Footer Social Site Area', 'landed' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Copy write', 'landed' ),
		'id'            => 'landed_footer_copywrite',
		'description'   => esc_html__( 'Footer Copy Write Area', 'landed' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'landed_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function landed_scripts() {
	wp_enqueue_style( 'landed-style', get_stylesheet_uri() );

	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', null, '1.0.0', 'all' );
	//wp_enqueue_style( 'nonscript-style', get_template_directory_uri() . '/assets/css/nonscript.css', null, '1.0.0', all );

	wp_enqueue_script( 'landed-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	//wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '20151215', true );
	wp_enqueue_script( 'jquery-scrollspy-script', get_template_directory_uri() . '/assets/js/jquery.scrolly.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery-dropotron-script', get_template_directory_uri() . '/assets/js/jquery.dropotron.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'jquery-scrollex-script', get_template_directory_uri() . '/assets/js/jquery.scrollex.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'browser-script', get_template_directory_uri() . '/assets/js/browser.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'breakpoint-script', get_template_directory_uri() . '/assets/js/breakpoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'breakpoint-script', get_template_directory_uri() . '/assets/js/breakpoints.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'util-script', get_template_directory_uri() . '/assets/js/util.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), '20151215', true );

	wp_enqueue_script( 'landed-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'landed_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

