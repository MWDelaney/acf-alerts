<?php
/*
Plugin Name: Custom Post Type: Alerts
Plugin URI:
Description: Post type and ACF fields for Alerts post types.
Version: 1.0
Author: Michael W. Delaney
Author URI:
License: MIT
*/
namespace MWD\Alerts;

/**
 * Set up autoloader
 */
require __DIR__ . '/vendor/autoload.php';

/**
* Define Constants
*/
define( 'ALERTS_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ALERTS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

$alerts_init = new \MWD\Alerts\Init();
$alerts_admin = new \MWD\Alerts\Admin();

/**
 * Template wrapper
 *
 * @param string $slug The slug name for the generic template.
 * @param string $load The name of the specialised template.
 */
 function template($slug, $load = null) {
	 $t = new \MWD\Alerts\Templates;
	 $t->get_template_part( $slug, $load );
 }
 function template_data($data, $name) {
	 $d = new \MWD\Alerts\Templates;
	 $d->set_template_data( $data, $name );
 }
