<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://woodevz.com
 * @since             1.0.0
 * @package           Acf_Form_Addon
 *
 * @wordpress-plugin
 * Plugin Name:       ACF Form Addon
 * Plugin URI:        https://woodevz.com
 * Description:       ACF Form Addon is used to enhanced the functionality of ACF Custom Form Fields Plugins
 * Version:           1.0.0
 * Author:            Ansh Agarwal
 * Author URI:        https://woodevz.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       acf-form-addon
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ACF_FORM_ADDON_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-acf-form-addon-activator.php
 */
function activate_acf_form_addon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-form-addon-activator.php';
	Acf_Form_Addon_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-acf-form-addon-deactivator.php
 */
function deactivate_acf_form_addon() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-acf-form-addon-deactivator.php';
	Acf_Form_Addon_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_acf_form_addon' );
register_deactivation_hook( __FILE__, 'deactivate_acf_form_addon' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-acf-form-addon.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_acf_form_addon() {

	$plugin = new Acf_Form_Addon();
	$plugin->run();

}
run_acf_form_addon();
