<?php
/**
 * Class to register client-side assets (scripts and stylesheets) for the blocks.
 *
 * @package WebberZone\Popular_Authors
 */

namespace WebberZone\Popular_Authors\Frontend\Blocks;

use WebberZone\Popular_Authors\Frontend\Display;
use WebberZone\Popular_Authors\Frontend\Styles_Handler;
use WebberZone\Popular_Authors\Util\Hook_Registry;

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Widget to display the overall count.
 *
 * @since 1.2.0
 */
class Blocks {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		Hook_Registry::add_action( 'init', array( $this, 'register_blocks' ) );
		Hook_Registry::add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
	}

	/**
	 * Enqueue block editor assets.
	 *
	 * @since 1.4.0
	 */
	public function enqueue_editor_assets() {
		$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

		$style_array = Styles_Handler::get_style();

		if ( ! empty( $style_array['name'] ) ) {
			$style     = $style_array['name'];
			$extra_css = $style_array['extra_css'];

			wp_enqueue_style(
				"wzpa-editor-style-{$style}",
				plugins_url( "includes/css/{$style}{$suffix}.css", POP_AUTHOR_PLUGIN_FILE ),
				array(),
				POP_AUTHOR_VERSION
			);

			if ( ! empty( $extra_css ) ) {
				wp_add_inline_style( "wzpa-editor-style-{$style}", $extra_css );
			}
		}
	}

	/**
	 * Registers the block using the metadata loaded from the `block.json` file.
	 * Behind the scenes, it registers also all assets so they can be enqueued
	 * through the block editor in the corresponding context.
	 *
	 * @since 1.2.0
	 */
	public function register_blocks() {
		// Define an array of blocks with their paths and optional render callbacks.
		$blocks = array(
			'popular-authors' => array(
				'path'            => __DIR__ . '/build/popular-authors/',
				'render_callback' => array( $this, 'render_block_popular_authors' ),
			),
			'popular-posts'   => array(
				'path'            => __DIR__ . '/build/popular-posts/',
				'render_callback' => array( $this, 'render_block_popular_posts' ),
			),
		);

		/**
		 * Filters the blocks registered by the plugin.
		 *
		 * @since 1.3.0
		 *
		 * @param array $blocks Array of blocks registered by the plugin.
		 */
		$blocks = apply_filters( 'wzpa_register_blocks', $blocks );

		// Loop through each block and register it.
		foreach ( $blocks as $block_name => $block_data ) {
			$args = array();

			// If a render callback is provided, add it to the args.
			if ( isset( $block_data['render_callback'] ) ) {
				$args['render_callback'] = $block_data['render_callback'];
			}

			register_block_type_from_metadata( $block_data['path'], $args );
		}
	}

	/**
	 * Renders the `popular-authors/popular-authors` block on server.
	 *
	 * @since 1.3.0
	 * @param array $attributes The block attributes.
	 *
	 * @return string Returns the post content with popular posts added.
	 */
	public static function render_block_popular_authors( $attributes ) {

		// Map block attributes to PHP attributes.
		$attributes['extra_class']    = $attributes['className'] ?? '';
		$attributes['optioncount']    = $attributes['showOptionCount'] ?? false;
		$attributes['show_postcount'] = $attributes['showPostCount'] ?? false;
		$attributes['show_fullname']  = $attributes['showFullName'] ?? false;
		$attributes['show_avatar']    = $attributes['showAvatar'] ?? false;
		$attributes['exclude_admin']  = $attributes['excludeAdmin'] ?? false;
		$attributes['hide_empty']     = $attributes['hideEmptyAuthors'] ?? true;

		$arguments = array_merge(
			$attributes,
			array(
				'is_block' => 1,
				'echo'     => 0,
			)
		);

		if ( isset( $attributes['other_attributes'] ) ) {
			$arguments = wp_parse_args( $attributes['other_attributes'], $arguments );
		}

		/**
		 * Filters arguments passed to `wzpa_list_popular_authors` for the block.
		 *
		 * @since 1.1.0
		 *
		 * @param array $arguments Array of arguments.
		 * @param array $attributes Block attributes.
		 */
		$arguments = apply_filters( 'wzpa_block_popular_authors_arguments', $arguments, $attributes );

		// Enqueue the stylesheet for the selected style for this block.
		if ( isset( $arguments['styles'] ) ) {
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			$style_array = Styles_Handler::get_style( $arguments['styles'] );

			if ( ! empty( $style_array['name'] ) ) {
				$style     = $style_array['name'];
				$extra_css = $style_array['extra_css'];

				wp_register_style(
					"wzpa-style-{$style}",
					plugins_url( "includes/css/{$style}{$suffix}.css", POP_AUTHOR_PLUGIN_FILE ),
					array(),
					POP_AUTHOR_VERSION
				);
				wp_enqueue_style( "wzpa-style-{$style}" );
				wp_add_inline_style( "wzpa-style-{$style}", $extra_css );
			}
		}

		return Display::list_popular_authors( $arguments );
	}

	/**
	 * Renders the `popular-authors/popular-posts` block on server.
	 *
	 * @since 1.3.0
	 * @param array $attributes The block attributes.
	 *
	 * @return string Returns the post content with popular posts by author added.
	 */
	public static function render_block_popular_posts( $attributes ) {
		if ( empty( $attributes['author'] ) ) {
			return __( 'Select an author from the sidebar panel.', 'popular-authors' );
		}

		$arguments = array(
			'extra_class'     => $attributes['extra_class'] ?? '',
			'posts_per_page'  => $attributes['postsPerPage'] ?? 5,
			'post_type'       => $attributes['postType'] ?? 'post',
			'orderby'         => $attributes['orderby'] ?? 'comment_count',
			'order'           => $attributes['order'] ?? 'DESC',
			'daily'           => $attributes['daily'] ?? false,
			'daily_range'     => $attributes['dailyRange'] ?? 7,
			'hour_range'      => $attributes['hourRange'] ?? 24,
			'disp_list_count' => $attributes['showOptionCount'] ?? false,
		);

		/**
		 * Filters arguments passed to `wzpa_display_top_posts_by_author` for the block.
		 *
		 * @since 1.3.0
		 *
		 * @param array $arguments Array of arguments.
		 * @param array $attributes Block attributes.
		 */
		$arguments = apply_filters( 'wzpa_block_popular_posts_arguments', $arguments, $attributes );

		return \wzpa_display_top_posts_by_author(
			$attributes['author'],
			$attributes['field'] ?? 'id',
			$arguments,
			false
		);
	}
}
