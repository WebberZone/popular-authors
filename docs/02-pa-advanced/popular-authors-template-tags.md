---
slug: popular-authors-template-tags
title: "Popular Authors Template Tags"
products: [popular-authors]
sections: [02-pa-advanced]
tags: [popular-authors,template-tag,developer]
status: publish
order: 0
---

[Popular Authors](https://webberzone.com/plugins/popular-authors/) ships four PHP functions you can call from a theme, child theme, or plugin to display or fetch author data. All functions live in the global namespace and require [Top 10](https://webberzone.com/plugins/top-10/) to be active.

## wzpa_list_popular_authors()

Render or return the popular authors list.

```php
<?php wzpa_list_popular_authors( array(
    'number'        => 10,
    'optioncount'   => true,
    'show_avatar'   => true,
    'show_fullname' => false,
    'echo'          => true,
) ); ?>
```

**Parameters:** `$args` *(array, optional)* — accepts the full set of arguments listed under [Display arguments](#display-arguments) below. The default `echo` argument is `true`, which prints the output. Pass `'echo' => false` to receive the HTML as a string.

**Returns:** `void|string` — void when `echo` is `true`, the HTML string when `echo` is `false`.

## wzpa_get_popular_author_ids()

Fetch the raw list of popular author IDs and visit counts without rendering any markup.

```php
<?php
$authors = wzpa_get_popular_author_ids( array(
    'number' => 5,
    'daily'  => true,
) );

foreach ( $authors as $author ) {
    echo absint( $author->author_id ) . ': ' . absint( $author->visits ) . "\n";
}
?>
```

**Parameters:** `$args` *(array, optional)* — see [Query arguments](#query-arguments) below.

**Returns:** `object` — array of rows with `author_id` and `visits` properties.

## wzpa_display_top_posts_by_author()

Render or return the most popular posts for a specific author. Backed by [Top 10](https://webberzone.com/plugins/top-10/)'s `tptn_pop_posts()`.

```php
<?php
echo wzpa_display_top_posts_by_author(
    42,             // Author ID.
    'id',           // Field: id | slug | email | login.
    array(
        'posts_per_page' => 5,
    ),
    true            // Echo? Pass false to return the HTML string.
);
?>
```

**Parameters:**

- `$author` *(int|string, required)* — value to look up the author by. With `$field = 'id'`, pass a numeric user ID.
- `$field` *(string, optional)* — field to look up the author by. Accepts `id`, `slug`, `email`, or `login`. Default `id`.
- `$args` *(array, optional)* — display arguments passed to `tptn_pop_posts()`.
- `$echo_value` *(bool, optional)* — whether to print the output. Default `true`.

**Returns:** `string|void` — HTML string when `$echo_value` is `false`, void otherwise.

## wzpa_list_popular_authors_args()

Return the merged defaults for the popular authors display. Useful when you want to read the configured defaults without re-implementing the merge logic yourself.

```php
<?php
$defaults = wzpa_list_popular_authors_args();
?>
```

**Parameters:** `$args` *(array, optional)* — overrides applied on top of the defaults.

**Returns:** `array` — full list of display arguments with undefined values filled in.

## Display arguments

These arguments are accepted by `wzpa_list_popular_authors()` and `wzpa_list_popular_authors_args()`. The same key set is exposed by the [shortcode](https://webberzone.com/support/knowledgebase/popular-authors-shortcode/) and the [block](https://webberzone.com/support/knowledgebase/popular-authors-blocks/).

| Key | Type | Description |
| --- | --- | --- |
| `number` | Integer | Maximum authors to return. Default `-1` (all). |
| `daily` | Boolean | Use daily counts instead of overall counts. Default `false`. |
| `daily_range` | Integer / Null | Days in the custom period. Default `null`. |
| `hour_range` | Integer / Null | Hours in the custom period. Default `null`. |
| `offset` | Integer | Authors to skip from the top of the list. Default `0`. |
| `optioncount` | Boolean | Show the visit count. Default `true`. |
| `show_postcount` | Boolean | Show the published post count. Default `false`. |
| `exclude_admin` | Boolean | Skip the `admin` user. Default `false`. |
| `show_fullname` | Boolean | Use first and last name. Default `false`. |
| `show_avatar` | Boolean | Display the avatar. Default `false`. |
| `hide_empty` | Boolean | Hide authors with no posts. Default `true`. |
| `cache` | Boolean | Cache the HTML output. Default `true`. |
| `echo` | Boolean | Print the result instead of returning it. Default `true`. |
| `include` | Array / String | Author IDs to include. Overrides `exclude`. Default empty. |
| `exclude` | Array / String | Author IDs to exclude. Default empty. |
| `post_type` | String | Comma-separated list of post types. Default `post`. |
| `styles` | String | Style key: `no_style`, `card`, or `left_thumbs`. Default empty. |
| `before_list` | String | HTML before the list. Default `<ul>`. |
| `after_list` | String | HTML after the list. Default `</ul>`. |
| `before_list_item` | String | HTML before each list item. Default `<li>`. |
| `after_list_item` | String | HTML after each list item. Default `</li>`. |

## Query arguments

These arguments are accepted by `wzpa_get_popular_author_ids()` and map directly to the database query that aggregates visits from Top 10's tables.

| Key | Type | Description |
| --- | --- | --- |
| `blog_id` | Integer | Site ID. Default is the current site. |
| `number` | Integer | Authors to limit the query to. `-1` returns all. Default `-1`. |
| `daily` | Boolean | Query daily totals instead of overall totals. Default `false`. |
| `daily_range` | Integer | Days in the custom period. Default empty. |
| `hour_range` | Integer | Hours in the custom period. Default empty. |
| `offset` | Integer | Authors to offset. Default `0`. |
| `paged` | Integer | Page of results to return. Default `1`. |
| `include` | Array / String | Author IDs to include. Default empty array. |
| `exclude` | Array / String | Author IDs to exclude. Default empty array. |