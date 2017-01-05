<?php
namespace MWD\Alerts;
// Set up plugin class
class Admin {
	function __construct() {
		add_action( 'admin_menu', array($this, 'menu_pages') );
		add_action( 'parent_file', array($this, 'menu_highlight') );
		add_action('admin_head-edit.php',array($this, 'addAlertsButton') );
		add_action('admin_head-post-new.php',array($this, 'addAlertsButton') );
		add_action('admin_head-post.php',array($this, 'addAlertsButton') );
		add_action('admin_head-appearance_page_alert-message',array($this, 'addManageButton') );

	}

	function menu_pages(){
		if( function_exists('acf_add_options_page') ) {

			acf_add_options_page(array(
				'page_title' 	=> 'Alerts',
				'menu_title'	=> 'Alert',
				'menu_slug' 	=> 'alert-message',
				'capability'	=> 'edit_posts',
				'redirect'		=> false,
				'parent_slug'	=> 'themes.php',
			));
		}
	}


		function menu_highlight( $parent_file ) {
				global $current_screen;
					if($current_screen->post_type == 'alert') {
					$parent_file = 'themes.php';
				}

				return $parent_file;
		}


		/**
		 * Adds "Enable/Disable Alerts" button on list and edit pages
		 */
		function addAlertsButton() {
		    global $current_screen;


		    ?>
		        <script type="text/javascript">
				    jQuery( document ).ready(function() {
				        jQuery("body.post-type-alert .wrap h1, body.appearance_page_alert-message .wrap h1").append('<a href="themes.php?page=alert-message" class="page-title-action">Enable/Disable Alerts</a>');
				    });
		        </script>
		    <?php
		}

		/**
		 * Adds "Enable/Disable Alerts" button on list and edit pages
		 */
		function addManageButton() {
		    global $current_screen;


		    ?>
		        <script type="text/javascript">
				    jQuery( document ).ready(function() {
				        jQuery("body.appearance_page_alert-message .wrap h1").append('<a href="edit.php?post_type=alert" class="page-title-action">Manage Alerts</a>');
				    });
		        </script>
		    <?php
		}

}
