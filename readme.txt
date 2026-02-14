=== Popular Authors ===
Tags: popular, popular authors, author, top authors, views, top 10
Contributors: webberzone, Ajay
Donate link: https://wzn.io/donate-wz
Stable tag: 1.3.0
Requires at least: 6.3
Requires PHP: 7.4
Tested up to: 6.8
License: GPLv2 or later

Discover and appreciate your blog’s most popular authors, a simple and powerful addon for Top 10 - Popular Posts for WordPress.

== Description ==

[Popular Authors WordPress plugin](https://webberzone.com/downloads/popular-authors/) is the ultimate addon for [Top 10](https://webberzone.com/plugins/top-10/), the best plugin to showcase your most popular posts on WordPress. With Popular Authors, you can also highlight the top authors on your blog by page views and give them the recognition they deserve.

Popular Authors lets you display the most popular authors using different methods. You can use the Gutenberg block, the shortcode, the widget or the template tag to insert the popular authors list anywhere on your site. You can also customize the appearance and settings of each method to suit your needs.

Popular Authors also gives you the flexibility to choose the time range for calculating the page views. You can show the popular authors of all time, or limit it to a specific period, such as last day, last week, last month, etc. This way, you can keep your popular authors list fresh and dynamic.

Popular Authors is a must-have addon for Top 10 if you want to boost your blog's engagement and credibility. By showcasing your most popular authors, you can attract more readers, increase social shares, and build a loyal community around your blog.

= Features =

* Blocks: Add the Gutenberg blocks by searching for `popular authors` or `author` and customize its settings and style.
* Multi-widget capable: You can have multiple widgets of Popular Authors on your sidebar or footer, each with its own title, number of authors, time range, and more.
* Custom Time Range: List popular authors within a specific time range (eg. last 1 day, last 7 days, last 30 days, etc.) or show the all-time favorites.
* Shortcodes: Use the `[wzpa_popular_authors]` shortcode to display your most popular authors anywhere in your posts or pages and `[wzpa_display_top_posts_by_author]` to display popular posts by author.
* Template tags: Use `wzpa_list_popular_authors()` to display the popular authors programmatically in your theme files or plugins and `wzpa_display_top_posts_by_author()` to display popular posts by author.
* Inbuilt Styles: You can select between two inbuilt styles or create your own using CSS.

= Contribute =

Popular Authors is also available on [Github](https://github.com/webberzone/popular-authors). If you've got some cool feature that you'd like to implement into the plugin or a bug you've been able to fix, consider forking the project and sending me a pull request. Please don't use that for support requests.


== Screenshots ==

1. Popular Authors Widget settings
2. Popular Authors tab under Top 10 Settings

== Installation ==

= WordPress install (the easy way) =
1. Navigate to Plugins within your WordPress Admin Area

2. Click "Add new" and in the search box enter "Popular Authors"

3. Find the plugin in the list (usually the first result) and click "Install Now"

= Manual install =
1. Download the plugin

2. Extract the contents of popular-authors.zip to wp-content/plugins/ folder. You should get a folder called popular-authors.

3. Activate the Plugin in WP-Admin.

= Usage =

Popular Authors can be used in four ways:

1. Block: Add a Gutenberg block by searching for `popular authors` or `author`
2. Widget: Simply drag and drop "Popular Authors" widget into your theme’s sidebar and configure it
3. Shortcode `[wzpa_popular_authors]`, so you can embed it inside a post or a page
4. Template tag: Use `wzpa_list_popular_authors()` to display the popular authors anywhere on your theme

== Frequently Asked Questions ==

Check out the [FAQ on the plugin page](https://wordpress.org/plugins/popular-authors/#faq) and the [FAQ on the WebberZone knowledgebase](https://webberzone.com/support/product/popular-authors/).
It is the fastest way to get support as I monitor the forums regularly. I also provide [*paid* premium support via email](https://webberzone.com/support/).


= How can I customise the output? =

The main CSS class is:

* **wzpa_authors** or **wzpa_authors_daily**: Class of the main wrapper `div`

= Shortcodes =

Use `[wzpa_popular_authors]` to display the popular authors. Check [this knowledge base article for shortcode parameters](https://webberzone.com/support/knowledgebase/popular-authors-shortcode/).

= Template tags =

Use `wzpa_list_popular_authors()` to display the popular authors anywhere on your theme. Check [this knowledge base article for template tag parameters](https://webberzone.com/support/knowledgebase/popular-authors-template-tags/).

= Gutenberg blocks =

Add a Gutenberg block by searching for `popular authors` or `author`. Check [this knowledge base article for block parameters](https://webberzone.com/support/knowledgebase/popular-authors-blocks/).

= How can I report security bugs? =

You can report security bugs through the Patchstack Vulnerability Disclosure Program. The Patchstack team help validate, triage and handle any security vulnerabilities. [Report a security vulnerability.](https://patchstack.com/database/wordpress/plugin/popular-authors/vdp)

== Changelog ==

= 1.3.0 =

Release post: [https://webberzone.com/announcements/popular-authors-1-3-0](https://webberzone.com/announcements/popular-authors-1-3-0)

* Features:
	* Introducing a new feature to display popular posts by author, available as a Gutenberg block, shortcode, and template tag. This allows you to fetch and showcase popular posts for a specific author.
		* Use the `wzpa_display_top_posts_by_author` template tag to display the popular posts associated with a selected author easily.
		* The shortcode parameters are documented [here](https://webberzone.com/support/knowledgebase/popular-authors-shortcode/).
		* The block is documented [here](https://webberzone.com/support/knowledgebase/popular-authors-blocks/).
	* Introducing a new `post_type` parameter lets you display popular authors for specific post types. This feature is accessible via the shortcode and block, and can also be configured in the Settings panel if you have Top 10 Pro installed.

* Modifications:
	* Rewritten Popular Authors block for apiVersion 3 and better modular code.
	* Passing the `styles` parameter to the block will enqueue the style.

* Bug fixes:
	* Cache setting clashed with Top 10.

For previous changelog entries please visit [Github Releases page](https://github.com/WebberZone/popular-authors/releases)

== Upgrade Notice ==

= 1.3.0 =
Fixes several bugs and introduces a new feature to display popular posts by author. Check the release post on WebberZone.com
