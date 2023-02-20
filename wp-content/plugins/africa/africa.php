<?php
/*
Plugin Name: africa
Plugin URI: 
Description: Creation castom page with elementor.
Version: 1.0
Author: Vlad holt
Author URI: 
License: GPLv2 or later
Text Domain: africa
Domain Path: /plagin-languages/
*/

if (!defined('ABSPATH')) {
	die();
}

function slider_init_addon($widgets_manager)
{

	final class Africa {

		/**
		 * Addon Version
		 *
		 * @since 1.0.0
		 * @var string The addon version.
		 */
		const VERSION = '1.0.0';

		/**
		 * Minimum Elementor Version
		 *
		 * @since 1.0.0
		 * @var string Minimum Elementor version required to run the addon.
		 */
		const MINIMUM_ELEMENTOR_VERSION = '3.5.0';

		/**
		 * Minimum PHP Version
		 *
		 * @since 1.0.0
		 * @var string Minimum PHP version required to run the addon.
		 */
		const MINIMUM_PHP_VERSION = '7.3';

		/**
		 * Instance
		 *
		 * @since 1.0.0
		 * @access private
		 * @static
		 * @var \Elementor_Test_Addon\Plugin The single instance of the class.
		 */
		private static $_instance = null;

		/**
		 * Instance
		 *
		 * Ensures only one instance of the class is loaded or can be loaded.
		 *
		 * @since 1.0.0
		 * @access public
		 * @static
		 * @return \Elementor_Test_Addon\Plugin An instance of the class.
		 */
		public static function instance() {

			if ( is_null( self::$_instance ) ) {
				self::$_instance = new self();
			}
			return self::$_instance;

		}

		/**
		 * Constructor
		 *
		 * Perform some compatibility checks to make sure basic requirements are meet.
		 * If all compatibility checks pass, initialize the functionality.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function __construct() {

			if ( $this->is_compatible() ) {
				add_action( 'elementor/init', [ $this, 'init' ] );
			}
		}

		public function load_castom_text_domane(){
			load_plugin_textdomain('africa', false, '/africa/plagin-languages/');
		}

		/**
		 * Compatibility Checks
		 *
		 * Checks whether the site meets the addon requirement.
		 *
		 * @since 1.0.0
		 * @access public
		 */
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

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have Elementor installed or activated.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function admin_notice_missing_main_plugin() {

			if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor */
				esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'africa' ),
				'<strong>' . esc_html__( 'Elementor Test Addon', 'africa' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'africa' ) . '</strong>'
			);

			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required Elementor version.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function admin_notice_minimum_elementor_version() {

			if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

			$message = sprintf(
				/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'africa' ),
				'<strong>' . esc_html__( 'Elementor Test Addon', 'africa' ) . '</strong>',
				'<strong>' . esc_html__( 'Elementor', 'africa' ) . '</strong>',
				 self::MINIMUM_ELEMENTOR_VERSION
			);

			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}

		/**
		 * Admin notice
		 *
		 * Warning when the site doesn't have a minimum required PHP version.
		 *
		 * @since 1.0.0
		 * @access public
		 */
		public function admin_notice_minimum_php_version() 
		{
			if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

			$message = sprintf(
				/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
				esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'africa' ),
				'<strong>' . esc_html__( 'Elementor Test Addon', 'africa' ) . '</strong>',
				'<strong>' . esc_html__( 'PHP', 'africa' ) . '</strong>',
				 self::MINIMUM_PHP_VERSION
			);

			printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

		}

		
	    public function init() 
	    {
			add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );
			add_action( 'elementor/controls/register', [ $this, 'register_controls' ] );
			add_action( 'init', [$this, 'load_castom_text_domane' ] );               // translation conecting 
			//Add category
			function add_elementor_widget_categories ( $elements_manager)
			{
				$elements_manager->add_category(
					'Castom_category',
					[ 
						'title' => __('Castom category','africa'),
						'icon' => 'fa fa-mefkit',
					]
				);
			}

			add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );


			if (file_exists(plugin_dir_path( __FILE__ )."/inc/castom-testimonial-post-type.php")) { // castom post type testimonial
				require(plugin_dir_path( __FILE__ )."/inc/castom-testimonial-post-type.php");
				add_action( 'init','castom_testimonial_post_type');
			}else echo " No sach file or dirrectory -'/inc/castom-testimonial-post-type.php'!";
			
			if (file_exists(plugin_dir_path( __FILE__ )."/inc/castom-leadership-post-type.php")) { // castom post type leadership
				require(plugin_dir_path( __FILE__ )."/inc/castom-leadership-post-type.php");
				add_action( 'init','castom_leadership_post_type');
				if (file_exists(plugin_dir_path( __FILE__ )."/inc/castom-metaboxes.php")) { // castom metaboxes
				    require(plugin_dir_path( __FILE__ )."/inc/castom-metaboxes.php");
			    }else echo " No sach file or dirrectory -'/inc/castom-metaboxes.php'!";
			}else echo " No sach file or dirrectory -'/inc/castom-leadership-post-type.php'!";
			
			if (file_exists(plugin_dir_path( __FILE__ )."/inc/theme-options-settings.php")) { // castom theme option settings
				require(plugin_dir_path( __FILE__ )."/inc/theme-options-settings.php");
				$ThemeOptionsSettings = new ThemeOptionsSettings();
				register_activation_hook( __FILE__, array($ThemeOptionsSettings, 'activation'));
				register_deactivation_hook( __FILE__, array($ThemeOptionsSettings, 'deactivation'));
			}else echo " No sach file or dirrectory -'/inc/theme-options-settings.php'!";

		}

		// Add widget 
		public function register_widgets($widgets_manager) 
		{
			require_once( __DIR__ . '/widget/slider_widget.php' );
			require_once( __DIR__ . '/widget/simple_info_widget.php' );
			require_once( __DIR__ . '/widget/our_mission_widget.php' );
			require_once( __DIR__ . '/widget/discaver_widget.php' );
			require_once( __DIR__ . '/widget/donation_widget.php' );
			require_once( __DIR__ . '/widget/icon_info_widget.php' );
			require_once( __DIR__ . '/widget/leadership_widget.php' );
			require_once( __DIR__ . '/widget/testimonial_widget.php' );
			require_once( __DIR__ . '/widget/recently_blog_widget.php' );
			
			$widgets_manager->register( new Elementor_slider_widget() );
			$widgets_manager->register( new Elementor_Simple_Info_Widget() );
			$widgets_manager->register( new Elementor_our_mission_widget() );
			$widgets_manager->register( new Elementor_discaver_widget() );
			$widgets_manager->register( new Elementor_Donation_Widget() );
			$widgets_manager->register( new Elementor_Icon_Info_Widget() );
			$widgets_manager->register( new Elementor_leadership_widget() );
			$widgets_manager->register( new Elementor_testimonial_widget() );
			$widgets_manager->register( new Elementor_recently_blog_widget() );
		}

		
		public function register_controls($controls_manager) 
		{
			require_once( __DIR__ . '/controls/flaticon_control.php' );
			$controls_manager->register( new Elementor_Flapicon_Control() );
		}
		
	} Africa::instance();
}

add_action('plugins_loaded', 'slider_init_addon');


?>