<?php
/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package Popular_Authors
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @since 1.1.0
 */
function wzpa_register_blocks() {
	// Register Popular Authors block.
	register_block_type_from_metadata(
		POP_AUTHOR_PLUGIN_DIR . 'includes/blocks/popular-authors/',
		array(
			'render_callback' => 'render_wzpa_block',
		)
	);
}
add_action( 'init', 'wzpa_register_blocks' );


/**
 * Renders the `popular-authors/popular-authors` block on server.
 *
 * @since 1.1.0
 * @param array $attributes The block attributes.
 *
 * @return string Returns the post content with popular posts added.
 */
function render_wzpa_block( $attributes ) {

	// Map block attributes to PHP attributes.
	$attributes['extra_class']   = $attributes['className'];
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

	$arguments = wp_parse_args( $attributes['other_attributes'], $arguments );

	/**
	 * Filters arguments passed to `wzpa_list_popular_authors` for the block.
	 *
	 * @since 1.1.0
	 *
	 * @param array $arguments  Top 10 block options array.
	 * @param array $attributes Block attributes array.
	 */
	$arguments = apply_filters( 'wzpa_block_options', $arguments, $attributes );

	return wzpa_list_popular_authors( $arguments );
}
