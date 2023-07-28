<h1 align="center">WP Doc Generator</h1>

WordPress Doc Generator is a tool to automatically extract data about the __actions__, 
__filters__ and __shortcodes__ of your WordPress theme or plugin.


## Table of contents

- [Getting Started](#getting-started)
- [Command Line Usage](#command-line-usage)
- [Notes](#notes)
- [Alternatives](#alternatives)
- [Links](#links)

## Getting Started

### Installation

Install it with composer

```
composer require dudo1985/wpdocgen --dev
```

## Command Line Usage

First parameter is the input directory, second is the output file, e.g.

#### `vendor/bin/wp-doc-gen . hooks.md`

This will parse all the files in the current directory (.) and write a file called hooks.md

### Optional params

#### `--shortcodes` or `-s`

By default, WPDocGen search for hooks `apply_filters` and `do_actions`.
However, if you use the `--shortcodes` or `-s` will search for `add_shortcode` function instead.

#### `vendor/bin/wp-doc-gen . shortcodes.md -s`

---

#### `--exclude` or `-e`

Exclude the specified folders,  e.g.
#### `vendor/bin/wp-doc-gen . hooks.md --exclude vendor node_modules`

Another example, if you're launching the script from another dir:
#### `vendor bin/wp-doc-gen.php ../my-plugin/ docs/hooks.md --exclude vendor node_modules  --prefix yasr`

There is no need to include the full paths of the excluded dirs, it is automatically ../my-plugin/vendor and 
../my-plugin/node_modules

---

#### `--prefix` or `-p`
Only parse hooks or shortcodes starting with the specified prefixes.

#### `vendor/bin/wp-doc-gen . hooks.md --exclude vendor node_modules --prefix prefix_1 prefix_2`

## Real life Examples
### Generated markdown files
- https://github.com/Dudo1985/Yet-Another-Stars-Rating/blob/master/docs/yasr_hooks.md
- https://github.com/Dudo1985/Yet-Another-Stars-Rating/blob/master/docs/yasr_shortcodes.md
### Composer script
- [How I use it into composer](https://github.com/Dudo1985/Yet-Another-Stars-Rating/blob/182b01703f62e3303fe214252ad34cf4c2813005/composer.json#L18) 

## Notes
To make the parser work fine, the comment must be a valid phpDocBlock, e.g.

> ```
> /**
> * Use this action to add tabs inside shortcode creator for tinymce
> */
> do_action('yasr_add_tabs_on_tinypopupform');
> ```

will generate this code

>### `do_action('yasr_add_tabs_on_tinypopupform')`
>Source: [../yet-another-stars-rating/admin/editor/YasrEditorHooks.php, line 219](../yet-another-stars-rating/admin/editor//YasrEditorHooks.php:219)
>
>*Use this action to add tabs inside shortcode creator for tinymce*

or, another example with tags

> ``` 
> /**
> * Use this action to add content inside shortcode creator
> *
> * @param int $n_multi_set
> * @param string $multi_set the multiset name
> */
> do_action('yasr_add_content_on_tinypopupform', $n_multi_set, $multi_set);
>```

will generate this code with table

> ### `do_action('yasr_add_content_on_tinypopupform')`
>
> Source: [../yet-another-stars-rating/admin/editor/YasrEditorHooks.php, line 235](../yet-another-stars-rating/admin/editor/YasrEditorHooks.php:235)
> 
> *Use this action to add content inside shortcode creator*
> ```
>
> | Argument     | Type   | Description       |
> |--------------|--------|-------------------|
> | $n_multi_set | int    |                   |
> | $multi_set   | string | the multiset name |
> ```


But, if you use the type *after* the argument, e.g.

> 
> ```
> /**
> * @param $n_multi_set int
> */
> ```
>

this will insert the type (*int* and *string* in this example) inside the "Description" column:

> 
> ```
> | Argument     | Type | Description              |
> |--------------|------|--------------------------|
> | $n_multi_set |      | int                      |
> ```
>

## Alternatives
Here is a list of alternatives that I found. However, none of these satisfied my needs

- [WP Documentor](https://github.com/pronamic/wp-documentor/) by [Pronamic](https://github.com/pronamic)
| This is the project that I used for a while, but I needed something to best fit my needs. The following list comes
from their readme

- [WP Parser](https://github.com/WordPress/phpdoc-parser) by [WordPress](https://github.com/WordPress)
- [Hookster](https://github.com/themeblvd/hookster) by [Theme Blvd](https://github.com/themeblvd)
- [WordPress HookDoc](https://github.com/matzeeable/wp-hookdoc) by [Matthias Günter](https://github.com/matzeeable)
- [GitHub Actions for WordPress](https://github.com/10up/actions-wordpress/blob/stable/hookdocs-workflow.md) by [10up](https://github.com/10up)
- [Yoast Parser](https://github.com/Yoast/code-documentation-extractor) by [Yoast](https://github.com/Yoast)
- [WooCommerce Code Reference Generator](https://github.com/woocommerce/code-reference) by [WooCommerce](https://github.com/woocommerce)
- [WordPress Hooks Reference](https://github.com/johnbillion/wp-hooks) by [John Blackbourn](https://github.com/johnbillion) / [Human Made](https://github.com/humanmade)
- [wp-hooks-generator](https://github.com/johnbillion/wp-hooks-generator) by [John Blackbourn](https://github.com/johnbillion) / [Human Made](https://github.com/humanmade)

## Links

- https://developer.wordpress.org/plugins/hooks/
- https://developer.wordpress.org/plugins/hooks/actions/
- https://developer.wordpress.org/reference/functions/do_action/
- https://developer.wordpress.org/reference/functions/add_action/
- https://developer.wordpress.org/plugins/hooks/filters/
- https://developer.wordpress.org/reference/functions/apply_filters/
- https://developer.wordpress.org/reference/functions/add_filter/
- https://developer.wordpress.org/reference/hooks/
- https://developer.wordpress.org/reference/functions/add_shortcode/
- https://www.phpdoc.org/
- https://github.com/phpdocumentor/phpdocumentor
