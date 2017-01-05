<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'mwd_alerts_alert_appearance',
	'title' => 'Alert Appearance',
	'fields' => array (
		array (
			'choices' => array (
				'success' => 'Success',
				'info' => 'Info',
				'warning' => 'Warning',
				'danger' => 'Danger',
			),
			'default_value' => array (
				0 => 'info',
			),
			'ui' => 1,
			'ajax' => 0,
			'placeholder' => '',
			'return_format' => 'value',
			'key' => 'mwd_alerts_alert_type',
			'label' => 'Alert Type',
			'name' => 'type',
			'type' => 'select',
		),
		array (
			'tabs' => 'all',
			'toolbar' => 'basic',
			'media_upload' => 0,
			'key' => 'mwd_alerts_alert_content',
			'label' => '',
			'name' => 'content',
			'type' => 'wysiwyg',
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'alert',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'seamless',

));

endif;
