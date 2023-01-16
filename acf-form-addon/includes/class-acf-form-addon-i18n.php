<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://woodevz.com
 * @since      1.0.0
 *
 * @package    Acf_Form_Addon
 * @subpackage Acf_Form_Addon/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Acf_Form_Addon
 * @subpackage Acf_Form_Addon/includes
 * @author     Ansh Agarwal <ansh.agarwal@woodevz.com>
 */
class Acf_Form_Addon_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'acf-form-addon',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
