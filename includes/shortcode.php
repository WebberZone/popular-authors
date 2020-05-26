<?php
/**
 * Shortcode module
 *
 * @package Popular_Authors
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Creates a shortcode [wzpa_popular_authors number="5" daily="0"].
 *
 * @since  1.0.0
 *
 * @param  array $atts Shortcode attributes. See wzpa_list_popular_authors_args() for list of additional attributes.
 * @return string Formatted list of top authors.
 */
function wzpa_shortcode( $atts ) {

	$atts = shortcode_atts(
		array_merge(
			wzpa_list_popular_authors_args(),
			array(
				'is_shortcode' => 1,
				'echo'         => 0,
			)
		),
		$atts,
		'wzpa_popular_authors'
	);

	return wzpa_list_popular_authors( $atts );
}
add_shortcode( 'wzpa_popular_authors', 'wzpa_shortcode' );

