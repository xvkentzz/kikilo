<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * When populating this file, consider the following flow
 * of control:
 *
 * - Check if the $_REQUEST['plugin'] content actually is plugin-boilerplate/plugin-boilerplate.php
 * - Check if the $_REQUEST['action'] content actually is delete-plugin
 * - Run a check_ajax_referer check to make sure it goes through authentication
 * - Run a current_user_can check to make sure current user can delete a plugin
 *
 * @todo Consider multisite. Once for a single site in the network, once sitewide.
 *
 * @link       https://traxconn.com
 * @since      1.0.0
 * @package    Plugin_Boilerplate
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Perform Uninstall Actions.
 *
 * If uninstall not called from WordPress,
 * If no uninstall action,
 * If not this plugin,
 * If no caps,
 * then exit.
 *
 * @since    1.0.0
 */
function blp_uninstall() {

	if ( ! defined( 'WP_UNINSTALL_PLUGIN' )
		|| empty( $_REQUEST )
		|| ! isset( $_REQUEST['plugin'] )
		|| ! isset( $_REQUEST['action'] )
		|| 'plugin-boilerplate/plugin-boilerplate.php' !== $_REQUEST['plugin']
		|| 'delete-plugin' !== $_REQUEST['action']
		|| ! check_ajax_referer( 'updates', '_ajax_nonce' )
		|| ! current_user_can( 'activate_plugins' )
	) {

		exit;

	}

	/**
	 * It is now safe to perform uninstall actions here.
	 */

}

blp_uninstall();
