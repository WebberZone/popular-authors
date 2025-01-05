<?php
/**
 * Class to register client-side assets (scripts and stylesheets) for the blocks.
 *
 * @package WebberZone\Popular_Authors
 */

namespace WebberZone\Popular_Authors\Frontend\Blocks;

use WebberZone\Popular_Authors\Frontend\Display;

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
		add_action( 'init', array( $this, 'register_blocks' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
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
		$attributes['extra_class']   = isset( $attributes['className'] ) ? $attributes['className'] : '';
		$attributes['optioncount']   = $attributes['showOptionCount'];
		$attributes['show_fullname'] = $attributes['showFullName'];
		$attributes['show_avatar']   = $attributes['showAvatar'];
		$attributes['exclude_admin'] = $attributes['excludeAdmin'];
		$attributes['hide_empty']    = $attributes['hideEmptyAuthors'];

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
		 * @param array $arguments  Top 10 block options array.
		 * @param array $attributes Block attributes array.
		 */
		$arguments = apply_filters( 'wzpa_block_options', $arguments, $attributes );

		return Display::list_popular_authors( $arguments );
	}

	/**
	 * Enqueue scripts and styles for the block editor.
	 *
	 * @since 1.2.0
	 */
	public static function enqueue_block_editor_assets() {
	}
}
