<?php

$foo = 'foo';
$int = 5;

/**
 * Hook here to add new settings tab
 *
 * @param string $foo
 */
do_action('yasr_add_settings_tab', $foo);

/**
 * Hook here to add new settings tab
 *
 * @param int $foo
 */
do_action('yasr_right_settings_panel_box', $int);

/**
 * customize visitor_votes cookie name
 */
apply_filters('yasr_vv_cookie', 'yasr_visitor_vote_cookie');
