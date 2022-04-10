=== Popular Authors ===
Tags: popular, popular authors, authors, top authors, views, top 10
Contributors: webberzone, Ajay
Donate link: https://ajaydsouza.com/donate/
Stable tag: 1.1.0
Requires at least: 5.6
Requires PHP: 7.1
Tested up to: 5.9
License: GPLv2 or later

Display a list of the popular authors. A Top 10 WordPress plugin addon.

== Description ==

[Popular Authors WordPress plugin](https://webberzone.com/downloads/popular-authors/) is an addon for [Top 10](https://webberzone.com/plugins/top-10/) that allows you display the top authors on your blog by page views.

The most popular authors can be displayed using either the block, shortcode or via the inbuilt widget. You can also use the function `wzpa_list_popular_authors()` to display popular authors programmatically.

= Features =

* Block: Add a Gutenberg block by searching for `popular authors` or `author`
* Multi-widget capable: You can have several widgets of Popular Authors each with its own settings
* Custom Time Range: List popular authors within a specific time range (eg. last 1 day, last 7 days, last 30 days, etc.)
* Shortcode: Use the `[wzpa_popular_authors]` shortcode to display your most popular authors
* Template tags: Use `wzpa_list_popular_authors()` to display the popular authors programmatically

= Contribute =

Popular Authors is also available on [Github](https://github.com/webberzone/popular-authors)
So, if you've got some cool feature that you'd like to implement into the plugin or a bug you've been able to fix, consider forking the project and sending me a pull request. Please don't use that for support requests.


== Screenshots ==

1. Popular Authors Widget settings


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

Check out the [FAQ on the plugin page](https://wordpress.org/plugins/popular-authors/#faq) and the [FAQ on the WebberZone knowledgebase](https://webberzone.com/support/section/popular-authors/).
It is the fastest way to get support as I monitor the forums regularly. I also provide [*paid* premium support via email](https://webberzone.com/support/).


= How can I customise the output? =

The main CSS class is:

* **wzpa_authors** or **wzpa_authors_daily**: Class of the main wrapper `div`

= Shortcodes =

Use `[wzpa_popular_authors]` to display the popular authors. Optional parameters include `number` to limit the number of authors returned.

== Changelog ==

= 1.1.0 =

* Features:
	* New Gutenberg block. Find it by searching for `popular authors` or `author`
	* New settings tab added to Top 10 Settings page where global settings for this plugin can be configured

* Enhancements/Modifications:
	* An admin notice will be displayed if Top 10 v3 and above is not installed

= 1.0.1 =

* Widget now has two additonal settings: Exclude admins and Show full names to make it easier to use

= 1.0.0 =

* Initial release

For previous changelog entries please visit [Github Releases page](https://github.com/WebberZone/popular-authors/releases)


== Upgrade Notice ==

= 1.0.1 =
New release

