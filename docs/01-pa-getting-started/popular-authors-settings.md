---
slug: popular-authors-settings
title: "Popular Authors Settings"
products: [popular-authors]
sections: [01-pa-getting-started]
tags: [popular-authors,settings]
status: publish
order: 0
---

[kbtoc]

[Popular Authors](https://webberzone.com/plugins/popular-authors/) stores all of its configuration inside [Top 10](https://webberzone.com/plugins/top-10/)'s settings. There is no standalone settings page for Popular Authors. Open **Top 10 → Settings** and click the **Popular Authors** tab to access the settings below.

Every setting is prefixed with `wzpa_` in the database and is read through `tptn_get_option()`. Per-instance overrides set on the block, widget, or shortcode always take priority over the global defaults configured here.

## Output

### Cache output

Turn this ON to cache the HTML output of the popular authors list. The cache key is generated from the display arguments and the cache lifetime is shared with Top 10's `tptn_cache_time` filter.

**Default:** Enabled

### Number of authors to display

Maximum number of authors returned by the popular authors list when the consuming widget, shortcode, or block does not specify its own `number` attribute. Use `-1` to display all authors; on larger sites this can be expensive.

**Default:** `-1`

### Default custom period range

The next two settings define the default window when **Custom period** is enabled in a block or widget.

#### Day(s)

Number of days in the default custom period.

**Default:** `1`

#### Hour(s)

Number of hours in the default custom period.

**Default:** `0` **Range:** 0–23

### Show views

Display the total view count next to the author's name.

**Default:** Disabled

### Show post count

Display the number of published posts next to the author's name.

**Default:** Disabled

### Exclude 'admin' account

Skip the WordPress `admin` user from the list.

**Default:** Disabled

### Show full name

Use the author's first and last name instead of their display name. If the author has no first or last name on file, the display name is used as a fallback.

**Default:** Disabled

### Show Avatar

Display the author's avatar alongside their name.

**Default:** Disabled

### Post types to include *(Pro only)*

Select which post types are counted toward an author's popularity. The free plugin always uses `post`. Pro sites can pick additional post types here, and per-instance overrides can be supplied via the `post_type` shortcode or block attribute.

## HTML to display

### Before the list of posts

HTML tag placed before the list of authors.

**Default:** `<ul>`

### After the list of posts

HTML tag placed after the list of authors.

**Default:** `</ul>`

### Before each list item

HTML tag placed before each author in the list.

**Default:** `<li>`

### After each list item

HTML tag placed after each author in the list.

**Default:** `</li>`

## Styles

### Popular Authors style

Choose a built-in visual style. See [Popular Authors Styles](https://webberzone.com/support/knowledgebase/popular-authors-styles/) for a side-by-side comparison.

| Style | Description |
| --- | --- |
| No styles | Disable built-in CSS so your theme stylesheet can take over. |
| Card Layout | Display each author in a card using CSS grid. |
| Left Thumbs | Display the author in a grid with the avatar to the left of the text. |

**Default:** `no_style`