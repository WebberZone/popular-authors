<?php
/**
 * Shortcode module
 *
 * @package Popular_Authors
 */

/**
 * Creates a shortcode [pa_popular_authors number="5" daily="0"].
 *
 * @since  1.0.0
 *
 * @param  array $atts Shortcode attributes. See pa_list_popular_authors_args() for list of additional attributes.
 * @return string Formatted list of top authors.
 */
function pa_shortcode( $atts ) {

	$atts = shortcode_atts(
		array_merge(
			pa_list_popular_authors_args(),
			array(
				'is_shortcode' => 1,
				'echo'         => 0,
			)
		),
		$atts,
		'pa_popular_authors'
	);

	return pa_list_popular_authors( $atts );
}
add_shortcode( 'pa_popular_authors', 'pa_shortcode' );

