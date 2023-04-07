
 ### `do_action('yasr_add_admin_scripts_end')` 

 Source: [../yet-another-stars-rating//admin/classes/YasrAdmin.php, line 168](../yet-another-stars-rating//admin/classes/YasrAdmin.php:168)

*Add custom script in one of the page used by YASR, at the end*

| Argument | Type | Description |
| --- | --- | --- |
| $hook | string |  |
___

 ### `do_action('yasr_add_tabs_on_tinypopupform')` 

 Source: [../yet-another-stars-rating//admin/editor/YasrEditorHooks.php, line 218](../yet-another-stars-rating//admin/editor/YasrEditorHooks.php:218)

*Use this action to add tabs inside shortcode creator for tinymce*

___
 ### `do_action('yasr_add_content_on_tinypopupform')` 

 Source: [../yet-another-stars-rating//admin/editor/YasrEditorHooks.php, line 234](../yet-another-stars-rating//admin/editor/YasrEditorHooks.php:234)

*Use this action to add content inside shortcode creator*

| Argument | Type | Description |
| --- | --- | --- |
| $n_multi_set | int |  |
| $multi_set | string |  the multiset name |
___

 ### `do_action('yasr_metabox_below_editor_add_tab')` 

 Source: [../yet-another-stars-rating//admin/editor/YasrMetaboxBelowEditor.php, line 60](../yet-another-stars-rating//admin/editor/YasrMetaboxBelowEditor.php:60)

*Use this hook to add new tabs into the metabox below the editor*

___
 ### `do_action('yasr_metabox_below_editor_content')` 

 Source: [../yet-another-stars-rating//admin/editor/YasrMetaboxBelowEditor.php, line 66](../yet-another-stars-rating//admin/editor/YasrMetaboxBelowEditor.php:66)
___
 ### `do_action('yasr_add_content_multiset_tab_top')` 

 Source: [../yet-another-stars-rating//admin/editor/YasrMetaboxBelowEditor.php, line 205](../yet-another-stars-rating//admin/editor/YasrMetaboxBelowEditor.php:205)

*Hook here to add new content at the beginning of the div*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
| $set_id | int |  |
___
 ### `do_action('yasr_add_content_multiset_tab_pro')` 

 Source: [../yet-another-stars-rating//admin/editor/YasrMetaboxBelowEditor.php, line 288](../yet-another-stars-rating//admin/editor/YasrMetaboxBelowEditor.php:288)

*Hook here to add new content*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
| $set_id | int |  |
___

 ### `do_action('yasr_on_save_post')` 

 Source: [../yet-another-stars-rating//admin/editor/YasrOnSavePost.php, line 61](../yet-another-stars-rating//admin/editor/YasrOnSavePost.php:61)

*Hook here to add actions when YASR save data on save_post*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
___
 ### `do_action('yasr_action_on_overall_rating')` 

 Source: [../yet-another-stars-rating//admin/editor/YasrOnSavePost.php, line 106](../yet-another-stars-rating//admin/editor/YasrOnSavePost.php:106)

*Do action before overall rating is saved, works only in classic editor*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
| $rating | float |  |
___

 ### `do_action('yasr_add_content_bottom_topright_metabox')` 

 Source: [../yet-another-stars-rating//admin/editor/yasr-metabox-top-right.php, line 121](../yet-another-stars-rating//admin/editor/yasr-metabox-top-right.php:121)

*Hook here to add content at the bottom of the metabox*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
___

 ### `do_action('yasr_add_settings_tab')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrSettings.php, line 1166](../yet-another-stars-rating//admin/settings/classes/YasrSettings.php:1166)

*Hook here to add new settings tab*

___
 ### `do_action('yasr_settings_tab_content')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrSettings.php, line 1241](../yet-another-stars-rating//admin/settings/classes/YasrSettings.php:1241)

*Hook here to add new settings tab content*

___
 ### `do_action('yasr_right_settings_panel_box')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrSettings.php, line 1388](../yet-another-stars-rating//admin/settings/classes/YasrSettings.php:1388)
___

 ### `apply_filters('yasr_settings_select_ranking')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrSettingsRankings.php, line 60](../yet-another-stars-rating//admin/settings/classes/YasrSettingsRankings.php:60)
___

 ### `apply_filters('yasr_filter_style_options')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrSettingsStyle.php, line 37](../yet-another-stars-rating//admin/settings/classes/YasrSettingsStyle.php:37)
___
 ### `do_action('yasr_style_options_add_settings_field')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrSettingsStyle.php, line 46](../yet-another-stars-rating//admin/settings/classes/YasrSettingsStyle.php:46)
___
 ### `apply_filters('yasr_sanitize_style_options')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrSettingsStyle.php, line 265](../yet-another-stars-rating//admin/settings/classes/YasrSettingsStyle.php:265)
___

 ### `do_action('yasr_add_stats_tab')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrStats.php, line 56](../yet-another-stars-rating//admin/settings/classes/YasrStats.php:56)

*Use this hook to add a tab into yasr_stats_page*

___

 ### `apply_filters('yasr_export_box_button')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrStatsExport.php, line 144](../yet-another-stars-rating//admin/settings/classes/YasrStatsExport.php:144)

*Use this hook to customize the button*

___
 ### `do_action('yasr_export_box_end')` 

 Source: [../yet-another-stars-rating//admin/settings/classes/YasrStatsExport.php, line 160](../yet-another-stars-rating//admin/settings/classes/YasrStatsExport.php:160)

*Hook here to do an action at the end of the box*

___

 ### `do_action('yasr_migration_page_bottom')` 

 Source: [../yet-another-stars-rating//admin/settings/yasr-settings-migration.php, line 63](../yet-another-stars-rating//admin/settings/yasr-settings-migration.php:63)
___

 ### `do_action('yasr_stats_tab_content')` 

 Source: [../yet-another-stars-rating//admin/settings/yasr-stats-page.php, line 54](../yet-another-stars-rating//admin/settings/yasr-stats-page.php:54)

*Hook here to add new stats tab content*

___

 ### `apply_filters('yasr_feature_locked')` 

 Source: [../yet-another-stars-rating//admin/yasr-admin-init.php, line 33](../yet-another-stars-rating//admin/yasr-admin-init.php:33)
___
 ### `apply_filters('yasr_feature_locked_html_attribute')` 

 Source: [../yet-another-stars-rating//admin/yasr-admin-init.php, line 38](../yet-another-stars-rating//admin/yasr-admin-init.php:38)
___
 ### `apply_filters('yasr_feature_locked_text')` 

 Source: [../yet-another-stars-rating//admin/yasr-admin-init.php, line 53](../yet-another-stars-rating//admin/yasr-admin-init.php:53)
___

 ### `apply_filters('yasr_rankings_query_ov')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrDB.php, line 370](../yet-another-stars-rating//includes/classes/YasrDB.php:370)
___
 ### `apply_filters('yasr_rankings_query_vv')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrDB.php, line 414](../yet-another-stars-rating//includes/classes/YasrDB.php:414)
___
 ### `apply_filters('yasr_rankings_query_tu')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrDB.php, line 464](../yet-another-stars-rating//includes/classes/YasrDB.php:464)
___
 ### `apply_filters('yasr_rankings_multi_query')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrDB.php, line 509](../yet-another-stars-rating//includes/classes/YasrDB.php:509)
___
 ### `apply_filters('yasr_rankings_query_tr')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrDB.php, line 563](../yet-another-stars-rating//includes/classes/YasrDB.php:563)
___
 ### `apply_filters('yasr_rankings_multivv_query')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrDB.php, line 614](../yet-another-stars-rating//includes/classes/YasrDB.php:614)
___

 ### `apply_filters('yasr_user_rate_history_must_login_text')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrLastRatingsWidget.php, line 85](../yet-another-stars-rating//includes/classes/YasrLastRatingsWidget.php:85)

*Hook here to customize the message "You must login to see this widget." when*

*the shortcode yasr_user_rate_history is used*

___

 ### `apply_filters('yasr_custom_loader')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php, line 59](../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php:59)
___
 ### `apply_filters('yasr_custom_loader_url')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php, line 63](../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php:63)
___
 ### `do_action('yasr_add_front_script_css')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php, line 118](../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php:118)
___
 ### `do_action('yasr_add_front_script_js')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php, line 127](../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php:127)
___
 ### `apply_filters('yasr_gutenberg_constants')` 

 Source: [../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php, line 525](../yet-another-stars-rating//includes/classes/YasrScriptsLoader.php:525)
___

 ### `apply_filters('yasr_rest_rankings_args')` 

 Source: [../yet-another-stars-rating//includes/rest/classes/YasrCustomEndpoint.php, line 146](../yet-another-stars-rating//includes/rest/classes/YasrCustomEndpoint.php:146)
___
 ### `apply_filters('yasr_rest_sanitize')` 

 Source: [../yet-another-stars-rating//includes/rest/classes/YasrCustomEndpoint.php, line 277](../yet-another-stars-rating//includes/rest/classes/YasrCustomEndpoint.php:277)
___

 ### `apply_filters('yasr_tr_rankings_atts')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrNoStarsRankings.php, line 36](../yet-another-stars-rating//includes/shortcodes/classes/YasrNoStarsRankings.php:36)
___
 ### `apply_filters('yasr_tu_rankings_atts')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrNoStarsRankings.php, line 63](../yet-another-stars-rating//includes/shortcodes/classes/YasrNoStarsRankings.php:63)
___
 ### `apply_filters('yasr_tu_rankings_display')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrNoStarsRankings.php, line 124](../yet-another-stars-rating//includes/shortcodes/classes/YasrNoStarsRankings.php:124)
___

 ### `apply_filters('yasr_overall_rating_shortcode')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrOverallRating.php, line 52](../yet-another-stars-rating//includes/shortcodes/classes/YasrOverallRating.php:52)
___
 ### `apply_filters('yasr_cstm_text_before_overall')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrOverallRating.php, line 124](../yet-another-stars-rating//includes/shortcodes/classes/YasrOverallRating.php:124)
___

 ### `apply_filters('yasr_ov_rankings_atts')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrRankings.php, line 54](../yet-another-stars-rating//includes/shortcodes/classes/YasrRankings.php:54)
___
 ### `apply_filters('yasr_vv_rankings_atts')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrRankings.php, line 84](../yet-another-stars-rating//includes/shortcodes/classes/YasrRankings.php:84)

*Hook here to use shortcode atts.*

*If not used, will work with no support for atts*

| Argument | Type | Description |
| --- | --- | --- |
| $this | string | ->shortcode_name Name of shortcode caller |
| $atts | string|array |  Shortcode atts |
___
 ### `apply_filters('yasr_multi_set_ranking_atts')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrRankings.php, line 112](../yet-another-stars-rating//includes/shortcodes/classes/YasrRankings.php:112)
___
 ### `apply_filters('yasr_visitor_multi_set_ranking_atts')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrRankings.php, line 144](../yet-another-stars-rating//includes/shortcodes/classes/YasrRankings.php:144)

*Hook here to use shortcode atts.*

*If not used, shortcode will works only with setId param*

| Argument | Type | Description |
| --- | --- | --- |
| $this | string | ->shortcode_name Name of shortcode caller |
| $atts | string|array |  Shortcode atts |
___

 ### `apply_filters('yasr_size_ranking')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcode.php, line 88](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcode.php:88)
___
 ### `do_action('yasr_enqueue_assets_shortcode')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcode.php, line 157](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcode.php:157)
___

 ### `do_action('yasr_action_on_visitor_vote')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 89](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:89)
___
 ### `apply_filters('yasr_vv_cookie')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 159](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:159)
___
 ### `apply_filters('yasr_vv_updated_text')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 172](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:172)
___
 ### `apply_filters('yasr_vv_saved_text')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 175](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:175)
___
 ### `apply_filters('yasr_vv_rating_error_text')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 198](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:198)
___
 ### `do_action('yasr_action_on_visitor_multiset_vote')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 289](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:289)
___
 ### `apply_filters('yasr_mv_cookie')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 375](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:375)
___
 ### `apply_filters('yasr_mv_saved_text')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 384](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:384)
___
 ### `apply_filters('yasr_filter_ranking_request')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 567](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:567)
___
 ### `apply_filters('yasr_add_sources_ranking_request')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php, line 618](../yet-another-stars-rating//includes/shortcodes/classes/YasrShortcodesAjax.php:618)
___

 ### `apply_filters('yasr_mv_cookie')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorMultiSet.php, line 113](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorMultiSet.php:113)
___
 ### `apply_filters('yasr_must_sign_in')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorMultiSet.php, line 167](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorMultiSet.php:167)
___

 ### `apply_filters('yasr_vv_ro_shortcode')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php, line 109](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php:109)
___
 ### `apply_filters('yasr_vv_cookie')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php, line 119](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php:119)
___
 ### `apply_filters('yasr_cstm_text_already_voted')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php, line 193](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php:193)
___
 ### `apply_filters('yasr_must_sign_in')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php, line 205](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php:205)
___
 ### `apply_filters('yasr_cstm_text_before_vv')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php, line 231](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php:231)
___
 ### `apply_filters('yasr_cstm_text_after_vv')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php, line 274](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php:274)
___
 ### `apply_filters('yasr_vv_shortcode')` 

 Source: [../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php, line 377](../yet-another-stars-rating//includes/shortcodes/classes/YasrVisitorVotes.php:377)
___

 ### `apply_filters('yasr_filter_ip')` 

 Source: [../yet-another-stars-rating//includes/yasr-includes-functions.php, line 148](../yet-another-stars-rating//includes/yasr-includes-functions.php:148)
___

 ### `apply_filters('yasr_auto_insert_disable')` 

 Source: [../yet-another-stars-rating//public/classes/YasrPublicFilters.php, line 62](../yet-another-stars-rating//public/classes/YasrPublicFilters.php:62)
___
 ### `apply_filters('yasr_auto_insert_exclude_cpt')` 

 Source: [../yet-another-stars-rating//public/classes/YasrPublicFilters.php, line 92](../yet-another-stars-rating//public/classes/YasrPublicFilters.php:92)
___
 ### `apply_filters('yasr_title_vv_widget')` 

 Source: [../yet-another-stars-rating//public/classes/YasrPublicFilters.php, line 276](../yet-another-stars-rating//public/classes/YasrPublicFilters.php:276)
___
 ### `apply_filters('yasr_title_overall_widget')` 

 Source: [../yet-another-stars-rating//public/classes/YasrPublicFilters.php, line 313](../yet-another-stars-rating//public/classes/YasrPublicFilters.php:313)
___

 ### `apply_filters('yasr_filter_schema_jsonld')` 

 Source: [../yet-another-stars-rating//public/classes/YasrRichSnippets.php, line 73](../yet-another-stars-rating//public/classes/YasrRichSnippets.php:73)
___
 ### `apply_filters('yasr_filter_existing_schema')` 

 Source: [../yet-another-stars-rating//public/classes/YasrRichSnippets.php, line 132](../yet-another-stars-rating//public/classes/YasrRichSnippets.php:132)
___
 ### `apply_filters('yasr_filter_schema_title')` 

 Source: [../yet-another-stars-rating//public/classes/YasrRichSnippets.php, line 164](../yet-another-stars-rating//public/classes/YasrRichSnippets.php:164)
___

 ### `do_action('yasr_display_posts_top')` 

 Source: [../yet-another-stars-rating//templates/content.php, line 28](../yet-another-stars-rating//templates/content.php:28)

*hook here to add content at the beginning of yasr_display_posts*

___
 ### `do_action('yasr_display_posts_bottom')` 

 Source: [../yet-another-stars-rating//templates/content.php, line 61](../yet-another-stars-rating//templates/content.php:61)

*hook here to add content at the end of yasr_display_posts*

___

 ### `do_action('yasr_ur_add_custom_form_fields')` 

 Source: [../yet-another-stars-rating//yasr_pro/public/classes/YasrProCommentForm.php, line 170](../yet-another-stars-rating//yasr_pro/public/classes/YasrProCommentForm.php:170)
___
 ### `apply_filters('yasr_ur_display_custom_fields')` 

 Source: [../yet-another-stars-rating//yasr_pro/public/classes/YasrProCommentForm.php, line 284](../yet-another-stars-rating//yasr_pro/public/classes/YasrProCommentForm.php:284)
___
 ### `do_action('yasr_ur_save_custom_form_fields')` 

 Source: [../yet-another-stars-rating//yasr_pro/public/classes/YasrProCommentForm.php, line 495](../yet-another-stars-rating//yasr_pro/public/classes/YasrProCommentForm.php:495)
___
 ### `do_action('yasr_ur_do_content_after_save_commentmeta')` 

 Source: [../yet-another-stars-rating//yasr_pro/public/classes/YasrProCommentForm.php, line 504](../yet-another-stars-rating//yasr_pro/public/classes/YasrProCommentForm.php:504)
___

 ### `do_action('yasr_fs_loaded')` 

 Source: [../yet-another-stars-rating//yet-another-stars-rating.php, line 82](../yet-another-stars-rating//yet-another-stars-rating.php:82)
___
