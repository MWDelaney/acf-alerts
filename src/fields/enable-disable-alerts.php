<?php
if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
      'key' => 'mwd_alerts_alert_options_page',
      'title' => 'Enable or Disable Alerts',
      'fields' => array(
          array(
              'post_type' => array(
                  0 => 'alert',
              ),
              'taxonomy' => array(
              ),
              'filters' => array(
                  0 => 'search',
              ),
              'return_format' => 'object',
              'key' => 'mwd_alerts_alert_enable',
              'label' => 'Enable/Disable Alerts',
              'name' => 'enabled_alerts',
              'type' => 'relationship',
              'instructions' => 'Add alerts to the right column to enable them; click "Manage Alerts" to add, edit, or delete alerts.',
          ),
      ),
      'location' => array(
          array(
              array(
                  'param' => 'options_page',
                  'operator' => '==',
                  'value' => 'alert-message',
              ),
          ),
      ),
      'style' => 'seamless',
    ));
}
