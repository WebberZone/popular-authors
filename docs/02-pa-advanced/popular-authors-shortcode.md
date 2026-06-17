---
slug: popular-authors-shortcode
title: "Popular Authors Shortcodes"
products: [popular-authors]
sections: [02-pa-advanced]
tags: [popular-authors,shortcode]
status: publish
order: 0
---

[Popular Authors](https://webberzone.com/plugins/popular-authors/) registers two shortcodes that let you embed the most-popular authors list and a list of top posts for a given author anywhere in your content. Visit counts are drawn from [Top 10](https://webberzone.com/plugins/top-10/).

If you are unfamiliar with shortcodes, read the [Shortcode entry in the WordPress Codex](https://codex.wordpress.org/Shortcode).

## \[wzpa_popular_authors\]

Use this shortcode to display the popular authors based on the number of visits tracked by [Top 10](https://webberzone.com/plugins/top-10/).

```text
[wzpa_popular_authors number="5" show_avatar="1"]
```

All attributes are optional. Attributes that are not set fall back to the defaults configured under **Top 10 → Settings → Popular Authors**.

| Parameter | Type | Description |
| --- | --- | --- |
| `number` | Integer | Maximum authors to return. Default empty (uses the `wzpa_number` setting, which defaults to `-1` / all authors). |
| `daily` | Boolean | Display daily or overall counts. Default `false`. |
| `daily_range` | Integer | Number of days in the custom period. Default `null`. |
| `hour_range` | Integer | Number of hours in the custom period. Default `null`. |
| `offset` | Integer | Number of authors to skip from the top. Use with pagination. Default `0`. |
| `optioncount` | Boolean | Show the visit count next to the author's name. Default `true`. |
| `show_postcount` | Boolean | Show the post count next to the author's name. Default `false`. |
| `exclude_admin` | Boolean | Exclude the `admin` user. Default `false`. |
| `show_fullname` | Boolean | Show the author's first and last name instead of their display name. Default `false`. |
| `show_avatar` | Boolean | Display the author's avatar. Default `false`. |
| `hide_empty` | Boolean | Hide authors with no published posts. Default `true`. |
| `cache` | Boolean | Cache the HTML output using Top 10's cache settings. Default `true`. |
| `include` | Array / String | Comma- or space-separated list of author IDs to include. Overrides `exclude`. Default empty. |
| `exclude` | Array / String | Comma- or space-separated list of author IDs to exclude. Default empty. |
| `post_type` | String | Comma-separated list of post types to include. Default `post`. |
| `styles` | String | Style key: `no_style`, `card`, or `left_thumbs`. Default uses the `wzpa_styles` setting. |
| `before_list` | String | HTML before the list. Default `<ul>`. |
| `after_list` | String | HTML after the list. Default `</ul>`. |
| `before_list_item` | String | HTML before each list item. Default `<li>`. |
| `after_list_item` | String | HTML after each list item. Default `</li>`. |

## \[wzpa_author_top_posts\]

Use this shortcode to display the most popular posts for a specific author. The shortcode calls `wzpa_display_top_posts_by_author()` under the hood.

```text
[wzpa_author_top_posts author="42" posts_per_page="5"]
```

The `author` attribute is required. All other attributes are optional.

| Parameter | Type | Description |
| --- | --- | --- |
| `author` | Integer / String | Author value. With `field="id"`, an integer user ID. With `field="slug"`, the user nicename. Default `0` (returns nothing). |
| `field` | String | Field to look up the author by. Accepts `id`, `slug`, `email`, or `login`. Default `id`. |
| `posts_per_page` | Integer | Number of posts to display. Default `10`. |
| `post_type` | String | Post type to retrieve. Default `post`. |
| `orderby` | String | Field to sort by. Default `visits`. |
| `order` | String | Sorting direction. Accepts `ASC` or `DESC`. Default `DESC`. |
| `daily` | Boolean | Retrieve daily counts instead of overall counts. Default `false`. |
| `disp_list_count` | Boolean | Display the count in parentheses. Default `true`. |