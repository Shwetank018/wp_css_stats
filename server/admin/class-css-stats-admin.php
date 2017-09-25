<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://learn.skillcrush.com
 * @since      1.0.0
 *
 * @package    Css_Stats
 * @subpackage Css_Stats/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Css_Stats
 * @subpackage Css_Stats/admin
 * @author     Skillcrush Development <dev@skillcrush.com>
 */
class Css_Stats_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Css_Stats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Css_Stats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, PLUGIN_DIR . 'client/dist/admin.bundle.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Css_Stats_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Css_Stats_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->plugin_name . '-common', PLUGIN_DIR . 'client/dist/commons.js', array(), $this->version, true );
		wp_enqueue_script( $this->plugin_name, PLUGIN_DIR . 'client/dist/admin.bundle.js', array(), $this->version, true );
		
		$css_stats = [
			'url' => get_stylesheet_directory_uri(),
			'path' => get_stylesheet_directory(),
			'files' => glob(get_stylesheet_directory() . '/dist/*.css'),
		];

		wp_localize_script( $this->plugin_name, 'css_stats', $css_stats);
				

	}

	/**
		* Adds the TXN Report item to the admin menu.
		*
		* @since 1.0.0
		*/
	public function add_admin_menu(){
			add_menu_page(
					'CSS Stats',
					'CSS Stats',
					'manage_options',
					'css-stats',
					array(&$this, 'display_css_stats'),
					'dashicons-media-code',
					'50.4' // position order
			);
	}

	/**
		* Requires the partial file to render the download txn report page content.
		*
		* @since 1.0.0
		*/
	public function display_css_stats()
	{
			// this is the admin page markup
			require_once plugin_dir_path( __FILE__ ). 'partials/css-stats-admin-display.php';
	}
}
