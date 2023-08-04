<?php

$foo = 'foo';
$int = 5;

/**
 * Hook here to add new settings tab
 * This is the second line
 *
 * @param string $foo This is the foo variable
 */
do_action('yasr_add_settings_tab', $foo);

/**
 * Hook here to add new settings tab
 *
 * @param int $int an int, it is 5
 */
do_action('yasr_right_settings_panel_box', $int);

/**
 * customize visitor_votes cookie name, no param given just the description
 */
apply_filters('yasr_vv_cookie', 'yasr_visitor_vote_cookie');
