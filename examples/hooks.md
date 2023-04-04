
 ### `do_action('yasr_add_admin_scripts_begin')` 

 Source: [../yet-another-stars-rating/admin//classes/YasrAdmin.php, line 151](../yet-another-stars-rating/admin//classes/YasrAdmin.php:151)

*Add custom script in one of the page used by YASR, at the beginning*

| Argument | Type | Description |
| --- | --- | --- |
| $hook | string |  |
___
 ### `do_action('yasr_add_admin_scripts_end')` 

 Source: [../yet-another-stars-rating/admin//classes/YasrAdmin.php, line 168](../yet-another-stars-rating/admin//classes/YasrAdmin.php:168)

*Add custom script in one of the page used by YASR, at the end*

| Argument | Type | Description |
| --- | --- | --- |
| $hook | string |  |
___

 ### `do_action('yasr_add_tabs_on_tinypopupform')` 

 Source: [../yet-another-stars-rating/admin//editor/YasrEditorHooks.php, line 218](../yet-another-stars-rating/admin//editor/YasrEditorHooks.php:218)

*Use this action to add tabs inside shortcode creator for tinymce*

___
 ### `do_action('yasr_add_content_on_tinypopupform')` 

 Source: [../yet-another-stars-rating/admin//editor/YasrEditorHooks.php, line 234](../yet-another-stars-rating/admin//editor/YasrEditorHooks.php:234)

*Use this action to add content inside shortcode creator*

| Argument | Type | Description |
| --- | --- | --- |
| $n_multi_set | int |  |
| $multi_set | string |  the multiset name |
___

 ### `do_action('yasr_metabox_below_editor_add_tab')` 

 Source: [../yet-another-stars-rating/admin//editor/YasrMetaboxBelowEditor.php, line 60](../yet-another-stars-rating/admin//editor/YasrMetaboxBelowEditor.php:60)

*Use this hook to add new tabs into the metabox below the editor*

___
 ### `do_action('yasr_metabox_below_editor_content')` 

 Source: [../yet-another-stars-rating/admin//editor/YasrMetaboxBelowEditor.php, line 66](../yet-another-stars-rating/admin//editor/YasrMetaboxBelowEditor.php:66)
___
 ### `do_action('yasr_add_content_multiset_tab_top')` 

 Source: [../yet-another-stars-rating/admin//editor/YasrMetaboxBelowEditor.php, line 205](../yet-another-stars-rating/admin//editor/YasrMetaboxBelowEditor.php:205)

*Hook here to add new content at the beginning of the div*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
| $set_id | int |  |
___
 ### `do_action('yasr_add_content_multiset_tab_pro')` 

 Source: [../yet-another-stars-rating/admin//editor/YasrMetaboxBelowEditor.php, line 288](../yet-another-stars-rating/admin//editor/YasrMetaboxBelowEditor.php:288)

*Hook here to add new content*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
| $set_id | int |  |
___

 ### `do_action('yasr_on_save_post')` 

 Source: [../yet-another-stars-rating/admin//editor/YasrOnSavePost.php, line 61](../yet-another-stars-rating/admin//editor/YasrOnSavePost.php:61)

*Hook here to add actions when YASR save data on save_post*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
___
 ### `do_action('yasr_action_on_overall_rating')` 

 Source: [../yet-another-stars-rating/admin//editor/YasrOnSavePost.php, line 106](../yet-another-stars-rating/admin//editor/YasrOnSavePost.php:106)

*Do action before overall rating is saved, works only in classic editor*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
| $rating | float |  |
___

 ### `do_action('yasr_add_content_bottom_topright_metabox')` 

 Source: [../yet-another-stars-rating/admin//editor/yasr-metabox-top-right.php, line 121](../yet-another-stars-rating/admin//editor/yasr-metabox-top-right.php:121)

*Hook here to add content at the bottom of the metabox*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id | int |  |
___

 ### `do_action('yasr_add_settings_tab')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrSettings.php, line 1166](../yet-another-stars-rating/admin//settings/classes/YasrSettings.php:1166)

*Hook here to add new settings tab*

___
 ### `do_action('yasr_settings_tab_content')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrSettings.php, line 1241](../yet-another-stars-rating/admin//settings/classes/YasrSettings.php:1241)

*Hook here to add new settings tab content*

___
 ### `do_action('yasr_right_settings_panel_box')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrSettings.php, line 1388](../yet-another-stars-rating/admin//settings/classes/YasrSettings.php:1388)
___

 ### `apply_filters('yasr_settings_select_ranking')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrSettingsRankings.php, line 60](../yet-another-stars-rating/admin//settings/classes/YasrSettingsRankings.php:60)
___

 ### `apply_filters('yasr_filter_style_options')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrSettingsStyle.php, line 37](../yet-another-stars-rating/admin//settings/classes/YasrSettingsStyle.php:37)
___
 ### `do_action('yasr_style_options_add_settings_field')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrSettingsStyle.php, line 46](../yet-another-stars-rating/admin//settings/classes/YasrSettingsStyle.php:46)
___
 ### `apply_filters('yasr_sanitize_style_options')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrSettingsStyle.php, line 265](../yet-another-stars-rating/admin//settings/classes/YasrSettingsStyle.php:265)
___

 ### `do_action('yasr_add_stats_tab')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrStats.php, line 56](../yet-another-stars-rating/admin//settings/classes/YasrStats.php:56)

*Use this hook to add a tab into yasr_stats_page*

___

 ### `apply_filters('yasr_export_box_button')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrStatsExport.php, line 144](../yet-another-stars-rating/admin//settings/classes/YasrStatsExport.php:144)

*Use this hook to customize the button*

___
 ### `do_action('yasr_export_box_end')` 

 Source: [../yet-another-stars-rating/admin//settings/classes/YasrStatsExport.php, line 160](../yet-another-stars-rating/admin//settings/classes/YasrStatsExport.php:160)

*Hook here to do an action at the end of the box*

___

 ### `do_action('yasr_migration_page_bottom')` 

 Source: [../yet-another-stars-rating/admin//settings/yasr-settings-migration.php, line 63](../yet-another-stars-rating/admin//settings/yasr-settings-migration.php:63)
___

 ### `do_action('yasr_stats_tab_content')` 

 Source: [../yet-another-stars-rating/admin//settings/yasr-stats-page.php, line 54](../yet-another-stars-rating/admin//settings/yasr-stats-page.php:54)

*Hook here to add new stats tab content*

___

 ### `apply_filters('yasr_feature_locked')` 

 Source: [../yet-another-stars-rating/admin//yasr-admin-init.php, line 33](../yet-another-stars-rating/admin//yasr-admin-init.php:33)
___
 ### `apply_filters('yasr_feature_locked_html_attribute')` 

 Source: [../yet-another-stars-rating/admin//yasr-admin-init.php, line 38](../yet-another-stars-rating/admin//yasr-admin-init.php:38)
___
 ### `apply_filters('yasr_feature_locked_text')` 

 Source: [../yet-another-stars-rating/admin//yasr-admin-init.php, line 53](../yet-another-stars-rating/admin//yasr-admin-init.php:53)
___
