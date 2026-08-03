# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Response Rules

- Return only the changed function or section, not the full file
- No explanation unless asked
- No suggestions outside the scope of what was asked
- Skip preamble and trailing summaries

> **DEPRECATED:** This plugin is no longer maintained. v1.5.0 was the final release — the feature is now built into Top 10 Pro. Treat any work here as maintenance-only unless the user says otherwise.

## Links

- GitHub: <https://github.com/WebberZone/popular-authors>
- WordPress.org: <https://wordpress.org/plugins/popular-authors/>
- Documentation: <https://webberzone.com/support/product/popular-authors/>
- webberzone.com: <https://webberzone.com/downloads/popular-authors/>

## Plugin Overview

Popular Authors (v1.5.0) is an addon for the Top 10 plugin that displays a ranked list of the site's most-popular authors, derived from Top 10's visit-count data. It requires Top 10 to be active (`Requires Plugins: top-10`). Namespace: `WebberZone\Popular_Authors`. Constants: `POP_AUTHOR_VERSION`, `POP_AUTHOR_PLUGIN_DIR`, `POP_AUTHOR_PLUGIN_URL`, `POP_AUTHOR_PLUGIN_FILE`. Settings are stored inside Top 10's own `tptn_settings` option (no separate option key). Requires WordPress 6.6+, PHP 7.4+. No Freemius. v1.5.0 is the final release; the feature is now built into Top 10 Pro.

## Commands

### PHP

```bash
composer phpcs          # Lint PHP (WordPress coding standards)
composer phpcbf         # Auto-fix PHP code style
composer phpstan        # Static analysis
composer phpcompat      # Check PHP 7.4–8.5 compatibility
composer test           # Run all checks (phpcs + phpcompat + phpstan)
composer zip            # Create distribution zip
```

### JavaScript/CSS / Blocks

```bash
npm run build           # Build blocks (src → includes/frontend/blocks/build/)
npm start               # Watch blocks
npm run lint:js         # ESLint on block source
npm run lint:css        # Stylelint on block source
node build-assets.js    # Minify CSS/JS assets (non-block)
```

Block source: `includes/frontend/blocks/src/` (two blocks: `popular-authors/`, `popular-posts/`).
Built output: `includes/frontend/blocks/build/`.

## Architecture

### Entry Point

`popular-authors.php` defines constants, loads the autoloader (`includes/autoloader.php`), then calls `\WebberZone\Popular_Authors\load_wzpa()` on `plugins_loaded`, which instantiates the singleton `Main`. It also directly loads `includes/functions.php`, which exposes global helper functions (`wzpa_list_popular_authors()`, `wzpa_get_popular_author_ids()`, `wzpa_list_popular_authors_args()`, `wzpa_display_top_posts_by_author()`).

### Key Components

- **`includes/class-main.php`** — Singleton. Instantiates `Shortcodes`, `Blocks`, `Styles_Handler`, and (on `is_admin()`) `Admin`. Registers the `Authors_Widget` on `widgets_init`.
- **`includes/frontend/class-display.php`** — `Display::list_popular_authors()` is the core rendering function. It aggregates visit counts from Top 10's database tables (via `tptn_pop_posts()` / `WebberZone\Top_Ten\Util\Helpers`) to rank authors, then renders the list. Caching reuses Top 10's cache settings (`tptn_get_option('cache_time')`).
- **`includes/frontend/class-popular-authors-display.php`** — `Popular_Authors_Display::get_author_top_posts()` queries Top 10's visit data filtered by a specific author (`author` + `field` parameters), used when rendering per-author top-posts output.
- **`includes/frontend/class-shortcodes.php`** — `[popular_authors]` shortcode.
- **`includes/frontend/widgets/class-authors-widget.php`** — Legacy widget.
- **`includes/frontend/blocks/`** — Two Gutenberg blocks built with wp-scripts: `popular-authors` (list of top authors) and `popular-posts` (top posts for a given author).
- **`includes/admin/class-admin.php`** — Hooks into Top 10's settings system via `tptn_settings_sections` and `tptn_registered_settings` filters to add a "Popular Authors" tab with its own options (`wzpa_cache`, `wzpa_number`, `wzpa_daily_range`, etc.) directly inside the Top 10 settings page. No standalone settings page. Also registers a dismissible deprecation notice (via Top 10's admin notices API) informing users that v1.5.0 is the final release.
- **`includes/admin/class-dashboard-widget.php`** — Adds a dashboard widget.
- **`includes/util/class-hook-registry.php`** — Same Hook_Registry pattern as other WebberZone plugins.

### Settings

This plugin has no own `wp_options` key. All configurable values are stored as fields within Top 10's `tptn_settings` array and accessed via `tptn_get_option( $key )`. The admin class injects Popular Authors fields into Top 10's settings UI by filtering `tptn_registered_settings`.
