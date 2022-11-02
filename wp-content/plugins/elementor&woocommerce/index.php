<?php
/**
 * Plugin Name: Elementor & Woocommerce
 * Description: Custom Elementor extension.
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      Rasel Ahmed
 * Author URI:  https://rasel-ahmed.unaux.com
 * Text Domain: EW-toolkit
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
final class ew_ecommerce_extention {
	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '7.0';
	private static $_instance = null;
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}
	public function __construct() {

		add_action( 'plugins_loaded', [ $this, 'on_plugins_loaded' ] );

	}
	public function i18n() {

		load_plugin_textdomain( 'EW-toolkit' );

	}
	public function on_plugins_loaded() {

		if ( $this->is_compatible() ) {
			add_action( 'elementor/init', [ $this, 'init' ] );
		}

	}
	public function is_compatible() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return false;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return false;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return false;
		}

		return true;

	}
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-test-extension' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'elementor-test-extension' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'elementor-test-extension' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function init() {
	
		$this->i18n();

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );

	}
	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/E-addon/slider.php' );
		require_once( __DIR__ . '/E-addon/content-blog-wiget.php' );
		require_once( __DIR__ . '/E-addon/product-carousel-wigets.php' );
		require_once( __DIR__ . '/E-addon/title-widgets.php' );
		require_once( __DIR__ . '/E-addon/cta-widgets.php' );
		require_once( __DIR__ . '/E-addon/email-subscribe-widgets.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \elementor_slider_wigets() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \elementor_content_blog_wigets() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \elementor_product_carousel_wigets() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \elementor_title_wigets() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \elementor_cta_wigets() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \elementor_email_subscribe_wigets() );
		
	}
	public function widget_styles() {

		wp_enqueue_style( 'elementor_slider', plugins_url( 'wigets/css/slider.css', __FILE__ ) );
		wp_enqueue_style( 'elementor_content_blog', plugins_url( 'wigets/css/content-box.css', __FILE__ ) );
		wp_enqueue_style( 'procuct-carousel', plugins_url( 'wigets/css/product-carousel.css', __FILE__ ) );
		wp_enqueue_style( 'title-widgets', plugins_url( 'wigets/css/title-widgets.css', __FILE__ ) );
		wp_enqueue_style( 'cta-widgets', plugins_url( 'wigets/css/cta-widgets.css', __FILE__ ) );
		wp_enqueue_style( 'email-subscribe', plugins_url( 'wigets/css/email-subscribe-widgets.css', __FILE__ ) );

	}

}

ew_ecommerce_extention::instance();
function elementor_plugin_scripts() {
	wp_enqueue_style( "slick",plugins_url('/assets/css/slick.css', __FILE__ ),array(),'5.15.4','all');
	wp_enqueue_style( "slick-theme",plugins_url('/assets/css/slick-theme.css', __FILE__ ),array(),'5.15.4','all');

	wp_enqueue_script( 'Slick-js',plugins_url('/assets/js/slick.min.js', __FILE__ ),array('jquery'),'5.15.4', true);

}
add_action( 'wp_enqueue_scripts', 'elementor_plugin_scripts' );