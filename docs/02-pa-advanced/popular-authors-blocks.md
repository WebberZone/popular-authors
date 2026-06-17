---
slug: popular-authors-blocks
title: "Blocks in Popular Authors"
products: [popular-authors]
sections: [02-pa-advanced]
tags: [popular-authors,block]
status: publish
order: 0
---

[Popular Authors](https://webberzone.com/plugins/popular-authors/) registers two Gutenberg blocks that you can drop into any post, page, or template. Both blocks render server-side and use the visit data tracked by [Top 10](https://webberzone.com/plugins/top-10/).

## Popular Authors block

Block name: `popular-authors/popular-authors`. The block renders the most popular authors on your site and can be used inside the Site Editor if you are using a block theme.

The block uses server-side rendering, so the editor preview reflects what visitors see on the front end.

| Setting | Type | Description |
| --- | --- | --- |
| Max authors to display | Number | Enter the maximum number of authors to display. `-1` displays all authors; use with caution on larger sites. |
| Offset | Number | Skip this many authors from the top of the list. Applies only when **Max authors to display** is greater than `0`. |
| Show views | Toggle | Display the number of views across all of the author's posts. |
| Show number of posts | Toggle | Display the number of published posts next to the author's name. |
| Custom period | Toggle | Switch between all-time counts and a custom period. When enabled, use **Daily range** and **Hour range** to define the window. |
| Daily range | Number | Number of days in the custom period. |
| Hour range | Number | Number of hours in the custom period. |
| Show Full Name | Toggle | Display the author's full name (`First Name Last Name`) when set; otherwise the display name is used. |
| Show Avatar | Toggle | Display the author's avatar. |
| Exclude admin | Toggle | Exclude the `admin` account. Enable if you publish posts under a different username. |
| Hide authors with no posts | Toggle | When ON, authors with no visited posts are excluded. |
| Author IDs to include | Text | Comma-separated list of author IDs to include. This has priority over **Author IDs to exclude**. |
| Author IDs to exclude | Text | Comma-separated list of author IDs to exclude. |
| Other attributes | Textarea | Found under the **Advanced** panel. Pass extra attributes as a URL-style query string, for example `post_type=post,page&styles=card`. |

## Popular Posts by Author block

Block name: `popular-authors/popular-posts`. Renders the most popular posts for a single author that you select from a dropdown.

| Setting | Type | Description |
| --- | --- | --- |
| Author | Dropdown | Select the author whose most popular posts you want to display. Selecting an author always sets the lookup field to `id`. |
| Number of posts | Range | Maximum number of popular posts to display. Range `1`–`100`. Default `10`. |
| Post Types | Token field | One or more post types to include. |
| Order By | Dropdown | Sort by `Visits`, `Date`, or `Title`. Default `Visits`. |
| Order | Dropdown | `Descending` or `Ascending`. Default `Descending`. |
| Custom period | Toggle | Switch between all-time counts and a custom period. |
| Number of days | Range | Days in the custom period. Default `1`. |
| Number of hours | Range | Hours in the custom period. Maximum `24`. Default `0`. |
| Display post count | Toggle | Display the number of visits after the post title. |