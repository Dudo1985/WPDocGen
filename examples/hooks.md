
 ### `do_action('yasr_add_tabs_on_tinypopupform')` 

 Source: [../yet-another-stars-rating/admin/editor//YasrEditorHooks.php, line 218](../yet-another-stars-rating/admin/editor//YasrEditorHooks.php:218)

*Use this action to add tabs inside shortcode creator for tinymce*

___
 ### `do_action('yasr_add_content_on_tinypopupform')` 

 Source: [../yet-another-stars-rating/admin/editor//YasrEditorHooks.php, line 234](../yet-another-stars-rating/admin/editor//YasrEditorHooks.php:234)

*Use this action to add content inside shortcode creator*

| Argument | Type | Description |
| --- | --- | --- |
| $n_multi_set |  |  int |
| $multi_set |  |  string the multiset name |
___

 ### `do_action('yasr_metabox_below_editor_add_tab')` 

 Source: [../yet-another-stars-rating/admin/editor//YasrMetaboxBelowEditor.php, line 60](../yet-another-stars-rating/admin/editor//YasrMetaboxBelowEditor.php:60)

*Use this hook to add new tabs into the metabox below the editor*

___
 ### `do_action('yasr_metabox_below_editor_content')` 

 Source: [../yet-another-stars-rating/admin/editor//YasrMetaboxBelowEditor.php, line 66](../yet-another-stars-rating/admin/editor//YasrMetaboxBelowEditor.php:66)
___
 ### `do_action('yasr_add_content_multiset_tab_top')` 

 Source: [../yet-another-stars-rating/admin/editor//YasrMetaboxBelowEditor.php, line 205](../yet-another-stars-rating/admin/editor//YasrMetaboxBelowEditor.php:205)

*Hook here to add new content at the beginning of the div*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id |  |  int |
| $set_id |  |  int |
___
 ### `do_action('yasr_add_content_multiset_tab_pro')` 

 Source: [../yet-another-stars-rating/admin/editor//YasrMetaboxBelowEditor.php, line 288](../yet-another-stars-rating/admin/editor//YasrMetaboxBelowEditor.php:288)

*Hook here to add new content*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id |  |  int |
| $set_id |  |  int |
___

 ### `do_action('yasr_on_save_post')` 

 Source: [../yet-another-stars-rating/admin/editor//YasrOnSavePost.php, line 61](../yet-another-stars-rating/admin/editor//YasrOnSavePost.php:61)

*Hook here to add actions when YASR save data on save_post*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id |  |  int |
___
 ### `do_action('yasr_action_on_overall_rating')` 

 Source: [../yet-another-stars-rating/admin/editor//YasrOnSavePost.php, line 106](../yet-another-stars-rating/admin/editor//YasrOnSavePost.php:106)

*Do action before overall rating is saved, works only in classic editor*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id |  |  int |
| $rating |  |  float |
___

 ### `do_action('yasr_add_content_bottom_topright_metabox')` 

 Source: [../yet-another-stars-rating/admin/editor//yasr-metabox-top-right.php, line 121](../yet-another-stars-rating/admin/editor//yasr-metabox-top-right.php:121)

*Hook here to add content at the bottom of the metabox*

| Argument | Type | Description |
| --- | --- | --- |
| $post_id |  |  int |
___
