---
slug: popular-authors-faq
title: "Popular Authors Frequently Asked Questions"
products: [popular-authors]
sections: [01-pa-getting-started]
tags: [popular-authors,faq]
status: publish
order: 0
---

Common questions about [Popular Authors](https://webberzone.com/plugins/popular-authors/), a [Top 10](https://webberzone.com/plugins/top-10/) addon.

## Why does the front end show "Please install and activate Top 10 plugin to display popular authors."?

Popular Authors depends on [Top 10](https://webberzone.com/plugins/top-10/) v3 or above for its visit data, helper functions, and cache settings. Install and activate Top 10, then reload the page.

## How do I customize the output?

The wrapper `<div>` carries the class `wzpa_authors`. Target that class from your theme stylesheet, or use the dedicated classes listed in [Popular Authors Styles](https://webberzone.com/support/knowledgebase/popular-authors-styles/).

## Where do I configure the default settings?

Under **Top 10 → Settings → Popular Authors**. Popular Authors does not register its own settings page; every option lives inside Top 10's settings array with a `wzpa_` prefix. See [Popular Authors Settings](https://webberzone.com/support/knowledgebase/popular-authors-settings/) for the full list.

## Can I show the count next to each author?

Yes. Enable **Show views** to display the visit count, and **Show post count** to display the number of published posts. Both are available per widget, shortcode, or block.

## Can I exclude the admin account?

Enable **Exclude admin** in the widget, shortcode, or block. Authors with the username `admin` are skipped during rendering.

## Can I include only a subset of authors?

Use the `include` attribute on the shortcode or block. The value is a comma-separated list of author IDs. The `include` filter always takes priority over `exclude`.

## Can I show only authors with posts in a specific post type?

The free plugin always counts posts from the `post` post type. With [Top 10 Pro](https://webberzone.com/plugins/top-10-pro/) installed, the **Post types to include** field appears under **Top 10 → Settings → Popular Authors** and lets you pick additional post types. The same value can be overridden per call by passing `post_type="post,page"` to the shortcode or block.

## Can I display top posts for a specific author?

Yes. Use the **Popular Posts by Author** block or the `[wzpa_author_top_posts]` shortcode, or call `wzpa_display_top_posts_by_author()` from a theme template. See [Popular Authors Shortcodes](https://webberzone.com/support/knowledgebase/popular-authors-shortcode/) and [Popular Authors Template Tags](https://webberzone.com/support/knowledgebase/popular-authors-template-tags/).

## Why does the widget preview look different from the front end?

The widget renders server-side through `Display::list_popular_authors()` and uses the same stylesheet as the front end. If the preview looks unstyled, open **Top 10 → Settings → Popular Authors** and confirm that a non-empty style is selected under **Styles**.

## Where can I get support?

The fastest path is the [WordPress.org support forum](https://wordpress.org/plugins/popular-authors/) and the [WebberZone Knowledge Base FAQ](https://webberzone.com/support/product/popular-authors/). Paid email support is also available from [WebberZone](https://webberzone.com/support/).