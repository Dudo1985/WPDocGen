<?php

/*

Copyright 2014 Dario Curvino (email : d.curvino@gmail.com)

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>
*/

if (!defined('ABSPATH')) {
    exit('You\'re not allowed to see this page');
} // Exit if accessed directly

/**
 **
 * ###What is?
 * `[yasr_overall_rating]` shortcode is read only and is used by the reviewer.
 * It comes in three sizes: "Small", "Medium", and "Large".
 * The text displayed before or after the rating can be customized in the settings.
 * The shortcode can be manually placed or automatically inserted using the auto insert feature
 * ### How to use it?
 * To insert the rating in this widget, there are two ways:
 *    - If you're using the Classic editor, simply give a rating in the YASR metabox that appears at the top right of the
 *        screen while you're writing a new post or page.
 *    - If you're using the new Gutenberg editor, click on the "+" icon to add a block, search for YASR, and select
 *        YASR: Overall Rating. A new panel will appear to the right, where you can add your rating.
 *
 * @return string|void|null
 */
add_shortcode('yasr_overall_rating', 'shortcode_overall_rating_callback');

/**
 *
 * ### What is?
 * With `[yasr_visitor_votes]` visitors can rate a post or page.
 * With it, you can:
 * - Choose to allow anonymous or logged in only users.
 * - Logged-in users can update their vote anytime.
 * - Size can be “Small”, “Medium” or “Large”.
 * - Customize the text shown before or after.
 * - Hover on the chart bar icon to see the stats.
 * ### How to use it?
 * To insert the rating in this widget, there are two ways:
 * - You can paste the shortcode [yasr_visitor_votes] where you need to show the widget, or you can use the auto insert
 * feature as explained in [this tutorial](https://yetanotherstarsrating.com/tutorials/).
 * - If you're using the new Gutenberg editor, click on the "+" icon to add a block, search for YASR and select YASR: Visitor Votes.
 *
 */
add_shortcode('yasr_visitor_votes', 'shortcode_visitor_votes_callback');

/**
 * `[yasr_multiset]` allows you to insert a rating for each aspect of your review (up to nine rows).
 *
 * The setid is a number that identifies the multiset.
 *
 * This shortcode return author multi set
 */
add_shortcode ('yasr_multiset',  'yasr_multiset_callback');

/**
 * Yasr Visitor Multiset
 */
add_shortcode ('yasr_visitor_multiset', 'yasr_visitor_multiset_callback');

/**
 * Yasr Overall Ranking
 *
 * This shortcode print the highest rated posts by overall_rating
 * @since 2.6.2
 */
add_shortcode ('yasr_ov_ranking', 'yasr_ov_ranking_callback');

/**
 * Yasr Visitor Votes Ranking
 *
 * This shortcode print the higher / most rated posts with yasr_visitor_votes
 */
add_shortcode ('yasr_most_or_highest_rated_posts', 'yasr_most_or_highest_rated_posts_callback');


/**
 * Yasr Top reviewers
 *
 * Shortcode to display most active reviewers
 * @since 2.6.2
 */
add_shortcode ('yasr_top_reviewers', 'yasr_ranking_users_callback');

/**
 * Yasr Most Active users
 *
 * This shortcode show which users leave more votes on yasr_visitor_votes
 * @since 2.6.2
 */
add_shortcode ('yasr_most_active_users', 'yasr_ranking_users_callback');


/**
 * YASR Multiset Ranking
 */
add_shortcode ('yasr_multi_set_ranking', 'yasr_multi_set_ranking_callback');

/**
 * Yasr Visitor Multiset Ranking
 */
add_shortcode ('yasr_visitor_multi_set_ranking', 'yasr_visitor_multi_set_ranking_callback');

/**
 * Yasr User Rate History
 *
 * When a user is logged in, print all the rating that user leaved
 */
add_shortcode('yasr_user_rate_history', 'yasr_users_front_widget_callback');
/**
 * Yasr Display Posts
 *
 * Display your posts according to YASR ratings. This shortcode works only on pages.
 *
 * @since 3.3.0
 */
add_shortcode('yasr_display_posts', 'yasr_display_posts_callback');
