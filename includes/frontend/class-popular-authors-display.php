<?php
/**
 * Popular Authors Display Class
 *
 * @package Popular_Authors
 * @since   1.3.0
 */

namespace WebberZone\Popular_Authors\Frontend;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class for displaying author's top posts.
 *
 * @since 1.3.0
 */
class Popular_Authors_Display {

	/**
	 * Get top posts for a specific author.
	 *
	 * @since 1.3.0
	 *
	 * @param int|string $author Author value for $field. A user ID, slug, email address, or login name.
	 * @param string     $field  Field to query by: 'id', 'ID', 'slug', 'email', or 'login'.
	 * @param array      $args {
	 *     Optional. Arguments for the query. See WP_Query for full list of supported arguments.
	 *
	 *     @type bool   $top_ten_query   Whether to query the top ten posts. Default true.
	 *     @type int    $posts_per_page  Number of posts to display. Default 10.
	 *     @type string $post_type       Post type to query. Default 'post'.
	 *     @type string $orderby         Field to order by. Default 'visits'.
	 *     @type string $order           Order direction. Default 'DESC'.
	 * }
	 * @return array|\WP_Error Array of post objects or \WP_Error on failure.
	 */
	public static function get_author_top_posts( $author, $field = 'id', $args = array() ) {

		$user = get_user_by( $field, $author );

		if ( ! $user ) {
			return new \WP_Error( 'invalid_author', __( 'Invalid author specified.', 'popular-authors' ) );
		}

		$defaults          = array(
			'top_ten_query'  => true,
			'posts_per_page' => 10,
			'post_type'      => 'post',
			'orderby'        => 'visits',
			'order'          => 'DESC',
		);
		$args              = wp_parse_args( $args, $defaults );
		$args['post_type'] = wp_parse_list( $args['post_type'] );

		$args['author'] = $user->ID;

		$posts = \get_tptn_posts( $args );

		return $posts;
	}

	/**
	 * Display author's top posts.
	 *
	 * @since 1.3.0
	 *
	 * @param int|string $author Author value for $field. A user ID, slug, email address, or login name.
	 * @param string     $field  Field to query by: 'id', 'ID', 'slug', 'email', or 'login'.
	 * @param array      $args   Optional. Arguments for the query.
	 * @return string HTML output of the author's top posts.
	 */
	public static function display_author_top_posts( $author, $field = 'id', $args = array() ) {

		$user = get_user_by( $field, $author );

		if ( ! $user ) {
			return sprintf(
				'<div class="popular-authors popular-authors-error">%s</div>',
				esc_html__( 'Invalid author specified.', 'popular-authors' )
			);
		}

		$defaults = array(
			'daily'           => false,
			'posts_per_page'  => 10,
			'post_type'       => 'post',
			'orderby'         => 'visits',
			'order'           => 'DESC',
			'heading'         => false,
			'disp_list_count' => true,
		);
		$args     = wp_parse_args( $args, $defaults );

		$args['post_type']   = wp_parse_list( $args['post_type'] );
		$args['extra_class'] = 'popular-authors popular-authors-posts';

		$args['author'] = $user->ID;

		$output = \tptn_pop_posts( $args );

		return $output;
	}
}
