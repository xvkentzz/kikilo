<?php
/**
 * @link              https://traxconn.com
 * @since             1.0.0
 * @package           Plugin_Boilerplate
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Boilerplate
 * Plugin URI:        https://plugin.com/plugin-boilerplate-uri/
 * Description:       A standard plugin boilerplate development.
 * Version:           1.0.0
 * Author:            Traxconn
 * Requires at least: 5.0.0
 * Requires PHP:      6.0
 * Tested up to:      4.9
 * Author URI:        https://traxconn.com/
 * License:           GPL-2.0+
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-boilerplate
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Current plugin version.
 */
define( 'PLUGIN_BOILERPLATE_VERSION', '1.0.0' );

/**
 * Define the Plugin basename
 */
define( 'PLUGIN_BOILERPLATE_BASE_NAME', plugin_basename( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 */
function blp_activate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-boilerplate-activator.php';
	Plugin_Boilerplate_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function blp_deactivate() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-boilerplate-deactivator.php';
	Plugin_Boilerplate_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'blp_activate' );
register_deactivation_hook( __FILE__, 'blp_deactivate' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and frontend site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-boilerplate.php';

/**
 * Begins execution of the plugin.
 * 
 * @since    1.0.0
 */
function blp_run() {

	$plugin = new Plugin_Boilerplate();
	$plugin->run();

}
blp_run();
