---
slug: popular-authors-and-top-10-integration
title: "Popular Authors and Top 10 Integration"
products: [popular-authors]
sections: [01-pa-getting-started]
tags: [popular-authors,top-10,integration]
status: publish
order: 0
---

[Popular Authors](https://webberzone.com/plugins/popular-authors/) is an addon for [Top 10](https://webberzone.com/plugins/top-10/) and cannot function without it. Popular Authors aggregates the visit counts that Top 10 tracks and ranks your site's authors by those counts. This article explains how the two plugins fit together.

## Requirements

- Top 10 v3.0 or above must be installed and active. Older versions do not expose the helper functions and database tables that Popular Authors relies on.
- The plugin declares `Requires Plugins: top-10` in its header, so WordPress 6.6+ shows a disabled "This plugin cannot be activated" notice if Top 10 is not active.
- WordPress 6.6 or above and PHP 7.4 or above are required to run the plugin.

If Top 10 is missing or inactive, the admin area shows a warning on **Dashboard** and **Plugins** pages and the front-end output is replaced with *Please install and activate Top 10 plugin to display popular authors.*

## How the integration works

### Visit data

Popular Authors pulls its data from two of Top 10's database tables:

- `wp_top_ten` — overall visit totals per post.
- `wp_top_ten_daily` — daily totals used when the **Custom period** toggle is enabled.

The plugin joins those tables against `wp_users` and `wp_posts` to compute a per-author sum, then renders the ranked list. The SQL is exposed through the `wzpa_query_fields`, `wzpa_query_join`, `wzpa_query_where`, `wzpa_query_groupby`, `wzpa_query_orderby`, `wzpa_query_limits`, and `wzpa_query_prepare_values` filters for advanced customization.

### Settings storage

Popular Authors has no separate `wp_options` row of its own. Every setting is stored as a field inside Top 10's `tptn_settings` array with the `wzpa_` prefix and is read through `tptn_get_option()`. You will find the Popular Authors settings under **Top 10 → Settings → Popular Authors**.

### Cache reuse

Output caching reuses Top 10's `tptn_cache_time` filter, so turning caching on for Popular Authors piggybacks on the same lifetime you have configured for Top 10. See [Popular Authors Settings](https://webberzone.com/support/knowledgebase/popular-authors-settings/#cache-output) for the toggle.

### Helper functions

Popular Authors calls into Top 10's helper namespace for date arithmetic and query building:

- `WebberZone\Top_Ten\Util\Helpers::get_from_date()` — used to build the `dp_date` cutoff for daily queries.
- `tptn_pop_posts()` — used to render the top posts by author list.
- `get_tptn_posts()` — used to fetch raw posts by author.
- `tptn_get_settings()` and `tptn_get_default_option()` — used to read the per-setting defaults.

These functions are only guaranteed to exist when Top 10 v3 is active.

## Top 10 Pro features

When [Top 10 Pro](https://webberzone.com/plugins/top-10-pro/) is active, an extra **Post types to include** field appears under **Top 10 → Settings → Popular Authors**. The free plugin always uses the `post` post type; Top 10 Pro lets you count custom post types toward an author's popularity. The same value can be overridden per shortcode or block via the `post_type` attribute.

## Uninstalling Top 10

Deactivating Top 10 also disables the front-end output of Popular Authors. If you uninstall Top 10 while Popular Authors is still installed, Popular Authors' admin notice will keep reminding you to reinstall it until you also deactivate or remove Popular Authors.