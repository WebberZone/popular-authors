---
title: Popular Authors
description: Popular Authors has been retired. v1.5.0 was the final release — the feature now lives in Top 10 Pro. Documentation remains here for existing installs.
permalink: /
---

<div class="hero">
  <div class="eyebrow">Retired &middot; Final Release v1.5.0</div>
  <h1>Popular Authors has been <em>retired</em></h1>
  <p class="lead">Popular Authors was a free addon for Top 10 that ranked your site's authors by page views. It is no longer under active development &mdash; the feature has been folded into <a href="https://webberzone.com/plugins/top-10/pro/" target="_blank">Top 10 Pro</a>. Existing installs keep working, but there will be no further updates or support, including security updates.</p>
  <div class="hero-ctas">
    <a href="https://webberzone.com/plugins/top-10/pro/" target="_blank" class="btn-primary">Explore Top 10 Pro</a>
    <a href="{{ '/docs/' | relative_url }}" class="btn-outline">Read the Docs</a>
    <a href="https://github.com/WebberZone/popular-authors" target="_blank" class="btn-outline">View on GitHub</a>
  </div>
</div>

<div class="home-section" style="padding-top:0;">
  <div class="notice-card">
    <div class="eyebrow">What this means for you</div>
    <p><strong>If you're already running Popular Authors,</strong> nothing breaks. The plugin keeps working exactly as it does today &mdash; it just won't receive further updates, bug fixes, or security patches.</p>
    <p><strong>If you want the same ranked-authors feature going forward,</strong> it's built directly into <a href="https://webberzone.com/plugins/top-10/pro/" target="_blank">Top 10 Pro</a>, so you can uninstall this addon once you upgrade.</p>
  </div>

  <div class="eyebrow">What it did</div>
  <h2 class="section-title" style="margin-bottom:8px;">A Top 10 addon for ranking authors</h2>
  <p style="color:var(--wz-warm-grey); max-width:64ch;">Popular Authors aggregated the visit counts tracked by <a href="https://webberzone.com/plugins/top-10/" target="_blank">Top 10</a> and ranked your site's authors by page views, with four ways to display the list.</p>

  <div class="feature-grid">
    <div class="feature-card">
      <h3>Blocks</h3>
      <p>Two Gutenberg blocks &mdash; a popular-authors list and a per-author top-posts list &mdash; both server-rendered.</p>
    </div>
    <div class="feature-card">
      <h3>Shortcodes &amp; widget</h3>
      <p><code>[wzpa_popular_authors]</code> and <code>[wzpa_display_top_posts_by_author]</code>, plus a multi-instance legacy widget.</p>
    </div>
    <div class="feature-card">
      <h3>Template tags</h3>
      <p><code>wzpa_list_popular_authors()</code> and related functions for calling from a theme or plugin directly.</p>
    </div>
    <div class="feature-card">
      <h3>Custom time ranges</h3>
      <p>Rank authors all-time or within a specific window &mdash; last day, last week, last month, and more.</p>
    </div>
    <div class="feature-card">
      <h3>Built-in styles</h3>
      <p>Card and left-thumbnail layouts out of the box, or disable built-in CSS entirely for full theme control.</p>
    </div>
    <div class="feature-card">
      <h3>Cached output</h3>
      <p>Reused Top 10's own cache settings and transient conventions, so there was nothing extra to configure.</p>
    </div>
  </div>
</div>

<div class="home-section" style="padding-top:0;">
  <div class="eyebrow">Get started</div>
  <h2 class="section-title" style="margin-bottom:16px;">Documentation for existing installs</h2>
  <div class="card-grid">
    <a class="doc-card" href="{{ '/docs/01-pa-getting-started/installing-popular-authors/' | relative_url }}">
      <h3>Getting Started</h3>
      <p>Install the plugin and understand what it needs to run.</p>
    </a>
    <a class="doc-card" href="{{ '/docs/01-pa-getting-started/popular-authors-and-top-10-integration/' | relative_url }}">
      <h3>Top 10 Integration</h3>
      <p>How Popular Authors and Top 10 fit together, and what's required.</p>
    </a>
    <a class="doc-card" href="{{ '/docs/01-pa-getting-started/popular-authors-settings/' | relative_url }}">
      <h3>Settings</h3>
      <p>Every option, all configured from inside the Top 10 settings page.</p>
    </a>
    <a class="doc-card" href="{{ '/docs/02-pa-advanced/popular-authors-template-tags/' | relative_url }}">
      <h3>Developer Reference</h3>
      <p>Template tags, shortcodes, blocks, and styles for extending the output.</p>
    </a>
  </div>
</div>
