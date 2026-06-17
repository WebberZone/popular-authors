---
slug: installing-popular-authors
title: "Installing Popular Authors"
products: [popular-authors]
sections: [01-pa-getting-started]
tags: [popular-authors,installation]
status: publish
order: 0
---

[Popular Authors](https://webberzone.com/plugins/popular-authors/) is a [Top 10](https://webberzone.com/plugins/top-10/) addon that ranks your site's authors by page views tracked by Top 10. Popular Authors is [hosted on WordPress.org](https://wordpress.org/plugins/popular-authors/) and requires Top 10 v3 or above to be installed and active.

## WordPress install (The easy way)

1. Install and activate [Top 10](https://wordpress.org/plugins/top-10/) if you have not already.
2. Navigate to **Plugins** within your WordPress admin area.
3. Click **Add New** and in the search box enter `Popular Authors`.
4. Find the plugin in the list and click **Install Now**.
5. Activate the plugin from the **Plugins** screen.

## Manual install

1. Download the [plugin zip](https://wordpress.org/plugins/popular-authors/) from WordPress.org.
2. Extract the contents of `popular-authors.zip` to the `wp-content/plugins/` folder. You should get a folder called `popular-authors`.
3. Activate the Plugin in WP-Admin under the **Plugins** screen.

## Installing via WP CLI

If you are using [WP CLI](http://wp-cli.org/), install and activate the plugin by running:

```bash
wp plugin install popular-authors --activate
```

To network activate on a multisite install, run:

```bash
wp plugin install popular-authors --activate-network
```

## Using Popular Authors

Popular Authors integrates with [Top 10](https://webberzone.com/plugins/top-10/) and stores all of its settings inside Top 10's own settings page. There is no standalone settings page for Popular Authors. After activation:

1. Open **Top 10 → Settings** in your WordPress admin.
2. Click the **Popular Authors** tab to configure defaults, styles, and HTML wrappers.
3. Add the popular authors list anywhere on your site using the [block](https://webberzone.com/support/knowledgebase/popular-authors-blocks/), [shortcode](https://webberzone.com/support/knowledgebase/popular-authors-shortcode/), widget, or [template tag](https://webberzone.com/support/knowledgebase/popular-authors-template-tags/).

If Top 10 v3 is not active, Popular Authors displays an admin notice and the output is replaced with the text *Please install and activate Top 10 plugin to display popular authors.*

See [Popular Authors and Top 10 integration](https://webberzone.com/support/knowledgebase/popular-authors-and-top-10-integration/) for details on how the two plugins work together.