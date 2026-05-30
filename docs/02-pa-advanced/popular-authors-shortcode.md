---
id: 224
slug: popular-authors-shortcode
title: "Popular Authors Shortcodes"
products: [popular-authors]
sections: [02-pa-advanced]
tags: [popular-authors,shortcode]
status: publish
order: 0
---

Popular Authors includes two shortcodes that allow you to display the list of top authors and the top posts by author. If you’re unfamiliar with shortcodes, please read <a href="https://codex.wordpress.org/Shortcode" target="_blank" rel="noreferrer noopener">this article in the WordPress Codex</a>.

## \[\[wzpa_popular_authors\]\]

Use this shortcode to display the popular authors based on their number of visits tracked by <a href="https://webberzone.com/plugins/top-10/" data-type="page" data-id="8237">Top 10</a>. This shortcode takes multiple different attributes, which are all optional, as follows:

<figure class="wp-block-table">
<table>
<thead>
<tr>
<th class="has-text-align-left" data-align="left">Parameter</th>
<th class="has-text-align-center" data-align="center">Type</th>
<th class="has-text-align-left" data-align="left">Description</th>
</tr>
</thead>
<tbody>
<tr>
<td class="has-text-align-left" data-align="left">number</td>
<td class="has-text-align-center" data-align="center">Integer</td>
<td class="has-text-align-left" data-align="left">Maximum authors to return or display. Default: empty (all authors).</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">daily</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Whether to show daily or overall counts. Default: false.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">daily_range</td>
<td class="has-text-align-center" data-align="center">Integer / Null</td>
<td class="has-text-align-left" data-align="left">The daily range for the custom period. Default: null.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">hour_range</td>
<td class="has-text-align-center" data-align="center">Integer / Null</td>
<td class="has-text-align-left" data-align="left">The hour range for the custom period. Default: null.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">offset</td>
<td class="has-text-align-center" data-align="center">Integer</td>
<td class="has-text-align-left" data-align="left">The number of authors to offset in retrieved results. Can be used in conjunction with pagination. Default: 0.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">optioncount</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Show the count in parenthesis next to the author’s name. Default: true.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">exclude_admin</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Whether to exclude the ‘admin’ account, if it exists. Default: false.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">show_fullname</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Whether to show the author’s full name. Default: false.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">show_avatar</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Whether to show the author’s avatar/thumbnail. Default: false.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">hide_empty</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Whether to hide any authors with no posts. Default: true.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">cache</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Whether to turn ON caching of the HTML output. Default: false.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">include</td>
<td class="has-text-align-center" data-align="center">Array / String</td>
<td class="has-text-align-left" data-align="left">Array or comma/space-separated list of author IDs to include. Only authors belonging to the list will be displayed. Default: empty.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">exclude</td>
<td class="has-text-align-center" data-align="center">Array / String</td>
<td class="has-text-align-left" data-align="left">Array or comma/space-separated list of author IDs to exclude. Default: empty.</td>
</tr>
</tbody>
</table>
</figure>

## \[\[wzpa_author_top_posts\]\]

Use this shortcode to display the most popular posts for an author. This shortcode takes multiple different attributes, which are all optional, as follows:

<figure class="wp-block-table">
<table>
<thead>
<tr>
<th class="has-text-align-left" data-align="left">Parameter</th>
<th class="has-text-align-center" data-align="center">Type</th>
<th class="has-text-align-left" data-align="left">Description</th>
</tr>
</thead>
<tbody>
<tr>
<td class="has-text-align-left" data-align="left">author</td>
<td class="has-text-align-center" data-align="center">Integer</td>
<td class="has-text-align-left" data-align="left">Author ID to retrieve posts for. Default: 0 (all authors).</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">field</td>
<td class="has-text-align-center" data-align="center">String</td>
<td class="has-text-align-left" data-align="left">Field to filter authors by. Options: <code>id</code>, <code>slug</code>. Default: <code>id</code>.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">posts_per_page</td>
<td class="has-text-align-center" data-align="center">Integer</td>
<td class="has-text-align-left" data-align="left">Number of posts to display per page. Default: 10.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">post_type</td>
<td class="has-text-align-center" data-align="center">String</td>
<td class="has-text-align-left" data-align="left">Post type to retrieve. Default: <code>post</code>.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">orderby</td>
<td class="has-text-align-center" data-align="center">String</td>
<td class="has-text-align-left" data-align="left">Field to sort posts by. Default: <code>visits</code>.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">order</td>
<td class="has-text-align-center" data-align="center">String</td>
<td class="has-text-align-left" data-align="left">Sorting order. Options: <code>ASC</code>, <code>DESC</code>. Default: <code>DESC</code>.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">daily</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Whether to retrieve daily counts or overall counts. Default: false.</td>
</tr>
<tr>
<td class="has-text-align-left" data-align="left">disp_list_count</td>
<td class="has-text-align-center" data-align="center">Boolean</td>
<td class="has-text-align-left" data-align="left">Whether to display the count in a list format. Default: true.</td>
</tr>
</tbody>
</table>
</figure>
