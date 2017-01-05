<?php
use PostTypes\PostType;
// Post type labels
$names = [
    'name' => 'alert',
    'singular' => 'Alert',
    'plural' => 'Alerts',
    'slug' => 'alert'
];
// Post type options
$options = [
	'supports' => array( 'title' ),
	'has_archive' => false,
	'exclude_from_search' => true,
	'publicly_queryable' => false,
	'capability_type' => 'page',
	'show_in_menu' => false
];
// Register post type
$alerts = new PostType($names, $options);
// Set post type dashicon
$alerts->icon('dashicons-warning');
// Set post type translation domain
$alerts->translation('cpt-alerts');
