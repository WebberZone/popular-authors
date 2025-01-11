<?php
/**
 * Shortcode module
 *
 * @package Popular_Authors
 */

namespace WebberZone\Popular_Authors\Frontend;

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Admin Columns Class.
 *
 * @since 1.2.0
 */
class Shortcodes {

	/**
	 * Constructor class.
	 *
	 * @since 1.2.0
	 */
	public function __construct() {
		add_shortcode( 'wzpa_popular_authors', array( __CLASS__, 'wzpa_popular_authors' ) );
		add_shortcode( 'wzpa_author_top_posts', array( __CLASS__, 'wzpa_author_top_posts' ) );
	}

	/**
	 * Creates a shortcode [wzpa_popular_authors number="5" daily="0"].
	 *
	 * @since  1.2.0
	 *
	 * @param  array $atts Shortcode attributes. See wzpa_list_popular_authors_args() for list of additional attributes.
	 * @return string Formatted list of top authors.
	 */
	public static function wzpa_popular_authors( $atts ) {

		$atts = shortcode_atts(
			array_merge(
				Display::list_popular_authors_args(),
				array(
					'is_shortcode' => 1,
					'echo'         => 0,
				)
			),
			$atts,
			'wzpa_popular_authors'
		);

		return Display::list_popular_authors( $atts );
	}

	/**
	 * Creates a shortcode for displaying top posts by author.
	 *
	 * @since 1.3.0
	 *
	 * @param array $atts {
	 *     Optional. Array of parameters.
	 *
	 *     @type int    $author      Author ID, username, slug, or email.
	 *     @type string $field       Field to query by. Default 'id'.
	 *     @type int    $posts_per_page     Number of posts to show. Default 10.
	 *     @type string $post_type   Post type to include. Default 'post'.
	 *     @type string $orderby     Order by parameter. Default 'visits'.
	 *     @type string $order       Sort order. Default 'DESC'.
	 * }
	 * @return string Formatted list of top posts.
	 */
	public static function wzpa_author_top_posts( $atts ) {
		$atts = shortcode_atts(
			array(
				'author'          => 0,
				'field'           => 'id',
				'posts_per_page'  => 10,
				'post_type'       => 'post',
				'orderby'         => 'visits',
				'order'           => 'DESC',
				'daily'           => false,
				'disp_list_count' => true,
			),
			$atts,
			'wzpa_author_top_posts'
		);

		if ( empty( $atts['author'] ) ) {
			return '';
		}
		$author = $atts['author'];
		$field  = $atts['field'];
		unset( $atts['author'], $atts['field'] );

		return \wzpa_display_top_posts_by_author(
			$author,
			$field,
			$atts,
			false
		);
	}
}
