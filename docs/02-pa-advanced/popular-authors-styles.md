---
slug: popular-authors-styles
title: "Popular Authors Styles"
products: [popular-authors]
sections: [02-pa-advanced]
tags: [popular-authors,styles,css]
status: publish
order: 0
---

[Popular Authors](https://webberzone.com/plugins/popular-authors/) ships with two built-in visual styles plus an opt-out option for theme-authored styles. Styles are configured globally under **Top 10 → Settings → Popular Authors** and can be overridden per widget, shortcode, or block.

## Available styles

| Style key | Description |
| --- | --- |
| `no_style` | Skip loading any built-in CSS so your theme can fully control the markup. |
| `card` | Render each author in a card laid out with CSS grid. |
| `left_thumbs` | Render the author avatar to the left of the name with CSS grid. |

The selected style is loaded automatically on the front end through `wp_enqueue_style` with the handle `wzpa-style-{name}`. The block editor also previews the same stylesheet via `wzpa-editor-style-{name}` so the editor matches the front-end output.

## CSS classes

The output wrapper `<div>` carries a predictable class hook that you can target from your own stylesheet. The full class list is filtered through the `wzpa_authors_class` filter.

| Class | When it is applied |
| --- | --- |
| `wzpa_authors` | Always. |
| `wzpa_authors_widget` | When the output is rendered from the widget. |
| `wzpa_authors_shortcode` | When the output is rendered from a shortcode. |
| `wzpa_authors_block` | When the output is rendered from a block. |
| `wzpa-{style}` | When a non-default `styles` argument is selected. |

Inline pieces inside the list use these classes:

| Class | What it wraps |
| --- | --- |
| `.wzpa_authorname` | The author's name (and any counts). |
| `.wzpa_optioncount` | The visit count when `optioncount` is enabled. |
| `.wzpa_postcount` | The post count when `show_postcount` is enabled. |

## Targeting a specific output

Combine the `wzpa_authors` base with one of the context classes to scope your CSS:

```css
.wzpa_authors_block .wzpa_authorname {
    font-weight: 600;
}

.wzpa_authors_widget .wzpa_authorname {
    font-style: italic;
}
```

## Custom HTML wrappers

The list and each item are wrapped in HTML that you can override from **Top 10 → Settings → Popular Authors → HTML to display**, or per call by passing `before_list`, `after_list`, `before_list_item`, or `after_list_item` to the shortcode, block, or template tag. The defaults are:

```text
before_list      <ul>
after_list       </ul>
before_list_item <li>
after_list_item  </li>
```

For example, to swap to an ordered list with custom item classes:

```text
[wzpa_popular_authors before_list='<ol class="top-authors">' after_list='</ol>' before_list_item='<li class="top-authors__item">' after_list_item='</li>']
```

## Dashboard widget styles

The WordPress dashboard widget added in 1.4.0 ships its own stylesheet under the handle `wzpa-dashboard-widget`. If you have `SCRIPT_DEBUG` enabled, the unminified `dashboard-widget.css` is loaded; otherwise the minified `dashboard-widget.min.css` is loaded. Target the wrapper with `.wzpa-dashboard-widget`.