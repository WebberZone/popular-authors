---
id: 8803
slug: popular-authors-blocks
title: "Blocks in Popular Authors"
products: [popular-authors]
sections: [02-pa-advanced]
status: publish
order: 0
---

Popular Authors includes two blocks allowing you to display the most popular authors and the most popular posts for an author. These are displayed on the basis of visits tracked by <a href="https://webberzone.com/plugins/top-10/" data-type="page" data-id="8237">Top 10</a>.

## Popular Authors block

The Popular Authors block is a Gutenberg block that can replace the widget or [shortcode](https://webberzone.com/support/knowledgebase/popular-authors-shortcode/) for displaying popular authors. This block can be used in your posts, pages, or any other custom post type. You can also use it within the Site Editor if you are using a block theme.

The block lets you preview the popular authors directly in the block editor. You can customise various aspects of the block using the sidebar as follows:

<figure class="wp-block-table">
<table>
<thead>
<tr>
<th>Setting</th>
<th>Type</th>
<th class="has-text-align-left" data-align="left">Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>Max authors to display</td>
<td>Number</td>
<td class="has-text-align-left" data-align="left">Enter the maximum number of authors to display. You can use -1 to display all the authors, but this should be used with caution on larger sites.</td>
</tr>
<tr>
<td>Offset</td>
<td>Number</td>
<td class="has-text-align-left" data-align="left">Number of authors to skip from the top.</td>
</tr>
<tr>
<td>Show count</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">Display the number of visits across all the author’s posts.</td>
</tr>
<tr>
<td>Custom period</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">Toggle between displaying all-time popular authors or popular authors for a custom period, which can be set using the next two settings. For example, setting it to 1 day and 12 hours will display the popular authors from the last 36 hours.</td>
</tr>
<tr>
<td>Daily range</td>
<td>Number</td>
<td class="has-text-align-left" data-align="left">Enter the number of days to define the range for displaying popular authors.</td>
</tr>
<tr>
<td>Hour range</td>
<td>Number</td>
<td class="has-text-align-left" data-align="left">Enter the number of hours within a day to define the range for displaying popular authors.</td>
</tr>
<tr>
<td>Show Full Name</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">If available, display the full name in the “First Name Last Name” format. Otherwise, use the Display Name.</td>
</tr>
<tr>
<td>Show Avatar</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">Display the author’s avatar.</td>
</tr>
<tr>
<td>Exclude admin</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">Exclude the admin username. If you’re not using the admin username to publish posts, toggle this ON.</td>
</tr>
<tr>
<td>Hide authors with no posts</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">By default, authors with no visited posts are excluded. Toggle this OFF to display all authors.</td>
</tr>
<tr>
<td>Author IDs to include</td>
<td>Text</td>
<td class="has-text-align-left" data-align="left">Enter a comma-separated list of author IDs that will be included. This field has priority over the exclude field below.</td>
</tr>
<tr>
<td>Author IDs to exclude</td>
<td>Text</td>
<td class="has-text-align-left" data-align="left">Enter a comma-separated list of author IDs that will be excluded.</td>
</tr>
<tr>
<td>Other attributes</td>
<td>Textarea field</td>
<td class="has-text-align-left" data-align="left">You can find this setting under the Advanced panel in the sidebar. Enter other attributes in a URL-style string-query. It supports any of the plugin’s global settings, e.g. <code>post_type=post,page&amp;styles=card</code>.</td>
</tr>
</tbody>
</table>
</figure>

## Popular Posts by Author

This block allows you to display the most popular posts for a specific author. These settings are in the sidebar:

<figure class="wp-block-table">
<table>
<thead>
<tr>
<th>Setting</th>
<th>Type</th>
<th class="has-text-align-left" data-align="left">Description</th>
</tr>
</thead>
<tbody>
<tr>
<td>Author</td>
<td>Dropdown</td>
<td class="has-text-align-left" data-align="left">Select the author from the list whose most popular posts you want to display.</td>
</tr>
<tr>
<td>Number of Posts</td>
<td>Number</td>
<td class="has-text-align-left" data-align="left">The maximum number of popular posts to display.</td>
</tr>
<tr>
<td>Post types</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">Select one or more post types that should be included.</td>
</tr>
<tr>
<td>Order by</td>
<td>Dropdown</td>
<td class="has-text-align-left" data-align="left">You can order the posts by number of visits, date or post title.</td>
</tr>
<tr>
<td>Order</td>
<td>Dropdown</td>
<td class="has-text-align-left" data-align="left">Ascending or Descending</td>
</tr>
<tr>
<td>Custom period</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">Toggle between displaying all-time popular posts or popular posts for a custom period, which can be set using the next two settings. For example, setting it to 1 day and 12 hours will display the popular authors from the last 36 hours.</td>
</tr>
<tr>
<td>Daily range</td>
<td>Number</td>
<td class="has-text-align-left" data-align="left">Enter the number of days to define the range for displaying popular posts.</td>
</tr>
<tr>
<td>Hour range</td>
<td>Number</td>
<td class="has-text-align-left" data-align="left">Enter the number of hours within a day to define the range for displaying popular posts.</td>
</tr>
<tr>
<td>Display post count</td>
<td>Toggle</td>
<td class="has-text-align-left" data-align="left">Display the number of visits after the post title.</td>
</tr>
</tbody>
</table>
</figure>
