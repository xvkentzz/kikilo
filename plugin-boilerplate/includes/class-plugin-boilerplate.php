<?php
/**
 * The file that defines the core plugin class.
 *
 * A class definition that includes attributes and functions used across both the
 * frontend side of the site and the admin area.
 *
 * @link       https://traxconn.com
 * @since      1.0.0
 *
 * @package    Plugin_Boilerplate
 * @subpackage Plugin_Boilerplate/includes
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * frontend site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Plugin_Boilerplate
 * @subpackage Plugin_Boilerplate/includes
 * @author     Traxconn <mail@traxconn.com>
 */
class Plugin_Boilerplate {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       Plugin_Boilerplate_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string       $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The unique prefix of this plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string       $plugin_prefix    The string used to uniquely prefix technical functions of this plugin.
	 */
	protected $plugin_prefix;

	/**
	 * The current version of the plugin.
	 *
	 * @since     1.0.0
	 * @access    protected
	 * @var       string       $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the frontend side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

		if ( defined( 'PLUGIN_BOILERPLATE_VERSION' ) ) {

			$this->version = PLUGIN_BOILERPLATE_VERSION;

		} else {

			$this->version = '1.0.0';

		}

		$this->plugin_name = 'plugin-boilerplate';
		$this->plugin_prefix = 'blp_';

		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_frontend_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function load_dependencies() {
		
		// The class responsible for orchestrating the actions and filters of the core plugin.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-boilerplate-loader.php';

		// The class responsible for defining internationalization functionality of the plugin.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-plugin-boilerplate-i18n.php';

		// The class responsible for defining all actions that occur in the admin area.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/admin/class-plugin-boilerplate-admin.php';

		// The class responsible for defining all actions that occur in the frontend side of the site.
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/frontend/class-plugin-boilerplate-frontend.php';

		$this->loader = new Plugin_Boilerplate_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Plugin_Boilerplate_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function set_locale() {

		$plugin_i18n = new Plugin_Boilerplate_I18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality of the plugin.
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Plugin_Boilerplate_Admin( $this->get_plugin_name(), $this->get_plugin_prefix(), $this->get_version() );

		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
		$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );

	}

	/**
	 * Register all of the hooks related to the frontend functionality of the plugin.
	 *
	 * @since     1.0.0
	 * @access    private
	 */
	private function define_frontend_hooks() {

		$plugin_frontend = new Plugin_Boilerplate_Frontend( $this->get_plugin_name(), $this->get_plugin_prefix(), $this->get_version() );

		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_frontend, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $plugin_frontend, 'enqueue_scripts' );

	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since    1.0.0
	 * 
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The unique prefix of the plugin used to uniquely prefix technical functions.
	 *
	 * @since    1.0.0
	 * 
	 * @return    string    The prefix of the plugin.
	 */
	public function get_plugin_prefix() {
		return $this->plugin_prefix;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since    1.0.0
	 * 
	 * @return    Plugin_Boilerplate_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since    1.0.0
	 * 
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}