<?php
$alerts = get_field('enabled_alerts', 'option');

if ($alerts) :
    foreach ($alerts as $p) : // variable must be called $post (IMPORTANT)
        $a_tags = array('a');
        $a_class = array();
        $a_class[] = 'alert-link';

        $h_tags = array('h1', 'h2', 'h3', 'h4', 'h5', 'h6');
        $h_class = array();
        $h_class[] = 'alert-heading';

        $data = array();
        $data['content'] = get_field('content', $p->ID);
        $data['content'] = \MWD\Alerts\Utilities::addclass($a_tags, $data['content'], $a_class);
        $data['content'] = \MWD\Alerts\Utilities::addclass($h_tags, $data['content'], $h_class);

        $data['type'] = get_field('type', $p->ID);

        \MWD\Alerts\template_data($data, 'context');

        \MWD\Alerts\template('content', 'alert');
    endforeach;
endif;
