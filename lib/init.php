<?php
namespace MWD\Alerts;
// Set up plugin class
class Init {
	function __construct() {
		/**
	   * Includes
	   *
	   * The $includes array determines the code library included in your theme.
	   * Add or remove files to the array as needed. Supports child theme overrides.
	   *
	   * Please note that missing files will produce a fatal error.
	   *
	   */
	 		$includes = [
				'lib/alerts-post-type.php',   // Post Type
	 		];
	 		foreach ($includes as $file) {
	 		  require_once ALERTS_PLUGIN_DIR . $file;
	 		}
	 		unset($file);

			//Initialize shortcodes
			add_action( 'init', array( $this, 'add_shortcodes' ) );

			// Add the ACF fields
			add_action( 'acf/init', array( $this, 'fields' ), 0 );

	}

	/**
	 * Enable all fields in the "Fields" subdirectory
	 */
	function fields() {
		foreach(glob(ALERTS_PLUGIN_DIR . 'lib/fields/*.php') as $field) {
				include($field);
		}
	}


	/**
	 * Add 'acf_alerts' shortcode
	 *
	 * @uses acf_alerts Function to build the shorcode
	 */
		function add_shortcodes() {
					add_shortcode( 'acf-alerts', array($this, 'acf_alerts'));
		}


		/**
		 * Build the shortcode, call templates
		 */
			public function acf_alerts($atts, $content = null) {
				$atts = shortcode_atts( array(
						"id" => false,
				), $atts );
				ob_start();
				\MWD\Alerts\template( 'alerts' );
				return ob_get_clean();
			}


}
