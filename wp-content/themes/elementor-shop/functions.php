<?php
/**
 * Elementor functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Elementor
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'elementor_shop_setup' ) ) :
	function elementor_shop_setup() {
		load_theme_textdomain( 'elementor-shop', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'elementor-shop' ),
			)
		);

		//Top Menu
		register_nav_menus(
			array(
				'top_menu' => esc_html__( 'Top Menu', 'elementor-shop' ),
			)
		);
		//Footer Left Menu
		register_nav_menus(
			array(
				'footer_left' => esc_html__( 'Footer Left Menu', 'elementor-shop' ),
			)
		);
		//Footer Right Menu
		register_nav_menus(
			array(
				'footer_right' => esc_html__( 'Footer Right Menu', 'elementor-shop' ),
			)
		);
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'elementor_shop_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'elementor_shop_setup' );
function elementor_shop_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'elementor_shop_content_width', 640 );
}
add_action( 'after_setup_theme', 'elementor_shop_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function elementor_shop_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'elementor-shop' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'elementor-shop' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'elementor_shop_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function elementor_shop_scripts() {
	wp_enqueue_style( "Boostrap", get_template_directory_uri().'/assets/css/bootstrap.min.css',array(),'5.0.2','all');
	wp_enqueue_style( "font-awesome-5.15", get_template_directory_uri().'/assets/css/all.min.css',array(),'5.15.4','all');

	wp_enqueue_style( 'elementor-style', get_stylesheet_uri());

	wp_enqueue_script( 'bootstrap', get_template_directory_uri(). '/assets/js/bootstrap.bundle.min.js',array('jquery'),'5.0.2', true);
	wp_enqueue_script( 'font-awesome-5.15', get_template_directory_uri(). '/assets/js/fontawesome.min.js',array('jquery'),'5.15.4', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'elementor_shop_scripts' );

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

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
