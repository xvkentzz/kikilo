<?php
/**
 * The frontend functionality of the plugin.
 *
 * @link       https://traxconn.com
 * @since      1.0.0
 *
 * @package    Plugin_Boilerplate
 * @subpackage Plugin_Boilerplate/includes/frontend
 */

 // If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The frontend functionality of the plugin.
 *
 * Defines the plugin name, version, and two hooks to
 * enqueue the frontend stylesheet and JavaScript.
 *
 * @package    Plugin_Boilerplate
 * @subpackage Plugin_Boilerplate/includes/frontend
 * @author     Traxconn <mail@traxconn.com>
 */
class Plugin_Boilerplate_Frontend {

	/**
	 * The ID of this plugin.
	 *
	 * @since     1.0.0
	 * @access    private    
	 * @var       string     $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The unique prefix of this plugin.
	 *
	 * @since     1.0.0
	 * @access    private    
	 * @var       string     $plugin_prefix    The string used to uniquely prefix technical functions of this plugin.
	 */
	private $plugin_prefix;

	/**
	 * The version of this plugin.
	 *
	 * @since     1.0.0
	 * @access    private    
	 * @var       string     $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param    string    $plugin_name      The name of the plugin.
	 * @param    string    $plugin_prefix    The unique prefix of this plugin.
	 * @param    string    $version          The version of this plugin.
	 */
	public function __construct( $plugin_name, $plugin_prefix, $version ) {

		$this->plugin_name   = $plugin_name;
		$this->plugin_prefix = $plugin_prefix;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the frontend side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( PLUGIN_BOILERPLATE_BASE_NAME ) . 'assets/css/plugin-boilerplate-frontend.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the frontend side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( PLUGIN_BOILERPLATE_BASE_NAME ) . 'assets/js/plugin-boilerplate-frontend.js', array( 'jquery' ), $this->version, true );

	}

}
