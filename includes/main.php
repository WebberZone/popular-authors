<?php
/**
 * Main functions
 *
 * @package Popular_Authors
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * List all the authors of the site, with several options available.
 *
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param array $args List of arguments. See wzpa_list_popular_authors_args() for full list.
 * @return void|string Void if 'echo' argument is true, list of authors if 'echo' is false.
 */
function wzpa_list_popular_authors( $args = array() ) {

	global $wpdb;

	$defaults = array(
		'is_widget'    => false,
		'is_shortcode' => false,
		'instance_id'  => 1,
	);

	$defaults = array_merge( $defaults, wzpa_list_popular_authors_args() );

	$args = wp_parse_args( $args, $defaults );

	$output = '';

	if ( ! function_exists( 'tptn_pop_posts' ) ) {
		return __( 'Please install and activate Top 10 plugin to display popular authors.', 'popular-authors' );
	}

	$authors = wzpa_get_popular_author_ids( $args );

	$author_post_count = array();
	foreach ( (array) $wpdb->get_results( "SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE " . get_private_posts_cap_sql( 'post' ) . ' GROUP BY post_author' ) as $row ) { // phpcs:ignore WordPress.DB.PreparedSQL.NotPrepared,WordPress.DB.DirectDatabaseQuery.DirectQuery,WordPress.DB.DirectDatabaseQuery.NoCaching
		$author_post_count[ $row->post_author ] = $row->count;
	}

	$daily_class     = $args['daily'] ? 'wzpa_authors_daily ' : 'wzpa_authors ';
	$widget_class    = $args['is_widget'] ? ' wzpa_authors_widget wzpa_authors_widget' . $args['instance_id'] : '';
	$shortcode_class = $args['is_shortcode'] ? ' wzpa_authors_shortcode' : '';

	$post_classes = $daily_class . $widget_class . $shortcode_class;

	/**
	 * Filter the classes added to the div wrapper of the Popular Authors.
	 *
	 * @since 1.0.0
	 *
	 * @param string $post_classes Post classes string.
	 */
	$post_classes = apply_filters( 'wzpa_authors_class', $post_classes );

	$output .= '<div class="' . $post_classes . '">';

	if ( $authors ) {
		$output .= $args['before_list'];

		foreach ( $authors as $author ) {
			$author_id   = $author->author_id;
			$views       = $author->sum_count;
			$no_of_posts = isset( $author_post_count[ $author_id ] ) ? $author_post_count[ $author_id ] : 0;

			if ( ! $no_of_posts && $args['hide_empty'] ) {
				continue;
			}

			$author = get_userdata( $author_id );

			if ( $args['exclude_admin'] && 'admin' === $author->display_name ) {
				continue;
			}

			if ( $args['show_fullname'] && $author->first_name && $author->last_name ) {
				$name = "$author->first_name $author->last_name";
			} else {
				$name = $author->display_name;
			}

			$output .= $args['before_list_item'];

			$link = sprintf(
				'<a href="%1$s" title="%2$s">%3$s</a>',
				get_author_posts_url( $author->ID, $author->user_nicename ),
				/* translators: %s: Author's display name. */
				esc_attr( sprintf( __( 'Posts by %s' ), $author->display_name ) ),
				$name
			);

			if ( $args['optioncount'] ) {
				$link .= ' (' . number_format_i18n( $views ) . ')';
			}

			$output .= $link;
			$output .= $args['after_list_item'];

		}

		$output .= $args['after_list'];
	}

	$output .= '</div>';

	if ( $args['echo'] ) {
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	} else {
		return $output;
	}
}

/**
 * Get the popular author IDs.
 *
 * @since 1.0.0
 *
 * @global wpdb $wpdb WordPress database abstraction object.
 *
 * @param string|array $args {
 *     Optional. Array or string of default arguments.
 *
 *     @type int          $blog_id       The site ID. Default is the current site.
 *     @type int          $number        Number of authors to limit the query for. Can be used in
 *                                       conjunction with pagination. Value -1 (all) is supported, but
 *                                       should be used with caution on larger sites.
 *                                       Default -1 (all authors).
 *     @type bool         $daily         Whether daily or overall counts. Default false.
 *     @type int          $daily_range   Daily range for custom period. Default empty.
 *     @type int          $hour_range    Hour range for custom period. Default empty.
 *     @type int          $offset        Number of authors to offset in retrieved results. Can be used in
 *                                       conjunction with pagination. Default 0.
 *     @type int          $paged         When used with number, defines the page of results to return. Default 1.
 *     @type array|string $include       Array or comma/space-separated list of author IDs to include. Default empty array.
 *     @type array|string $exclude       Array or comma/space-separated list of author IDs to exclude. Default empty array.
 * }
 * @return object List of popular authors and corresponding view counts.
 */
function wzpa_get_popular_author_ids( $args = array() ) {
	global $wpdb;

	// Initialise some variables.
	$fields  = array();
	$where   = '';
	$join    = '';
	$groupby = '';
	$orderby = '';
	$limits  = '';

	$defaults = array(
		'blog_id'     => get_current_blog_id(),
		'number'      => '',
		'daily'       => false,
		'daily_range' => null,
		'hour_range'  => null,
		'offset'      => '',
		'paged'       => 1,
		'include'     => array(),
		'exclude'     => array(),
	);

	// Parse incomming $args into an array and merge it with $defaults.
	$args = wp_parse_args( $args, $defaults );

	if ( $args['daily'] ) {
		$pop_posts_table = $wpdb->base_prefix . 'top_ten_daily';
	} else {
		$pop_posts_table = $wpdb->base_prefix . 'top_ten';
	}

	$offset = isset( $args['offset'] ) ? $args['offset'] : 0;

	// Fields to return.
	$fields[] = "{$wpdb->users}.ID as author_id";
	$fields[] = "SUM({$pop_posts_table}.cntaccess) as sum_count";

	$fields = implode( ', ', $fields );

	$blog_id = 0;
	if ( isset( $args['blog_id'] ) ) {
		$blog_id = absint( $args['blog_id'] );
	}

	$posts_table = $wpdb->get_blog_prefix( $blog_id ) . 'posts';

	// Create the JOIN clause.
	$join  = " INNER JOIN {$posts_table} ON {$posts_table}.post_author={$wpdb->users}.ID ";
	$join .= " INNER JOIN {$pop_posts_table} ON {$pop_posts_table}.postnumber={$posts_table}.ID ";

	// Create the WHERE clause.
	$where .= $wpdb->prepare( " AND {$pop_posts_table}.blog_id = %d ", $blog_id ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared

	// Parse and sanitize 'include'.
	if ( ! empty( $args['include'] ) ) {
		$include = wp_parse_id_list( $args['include'] );
	} else {
		$include = false;
	}

	// Parse include or exclude arguments. Include is always prioritised.
	if ( ! empty( $include ) ) {
		$ids    = implode( ',', $include );
		$where .= " AND $wpdb->users.ID IN ($ids)";
	} elseif ( ! empty( $args['exclude'] ) ) {
		$ids    = implode( ',', wp_parse_id_list( $args['exclude'] ) );
		$where .= " AND $wpdb->users.ID NOT IN ($ids)";
	}

	if ( $args['daily'] && function_exists( 'tptn_get_from_date' ) ) {

		$from_date = tptn_get_from_date( null, $args['daily_range'], $args['hour_range'] );

		$where .= $wpdb->prepare( " AND {$pop_posts_table}.dp_date >= %s ", $from_date ); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared
	}

	// Create the base GROUP BY clause.
	$groupby = ' author_id ';

	// Create the base ORDER BY clause.
	$orderby = ' sum_count DESC ';

	// Create the base LIMITS clause.
	if ( isset( $args['number'] ) && $args['number'] > 0 ) {
		// If exclude_admin is enabled, then we need to fetch an extra post.
		$number = isset( $args['exclude_admin'] ) && $args['exclude_admin'] ? $args['number'] + 1 : $args['number'];

		if ( $args['offset'] ) {
			$limits = $wpdb->prepare( 'LIMIT %d, %d', $args['offset'], $number );
		} else {
			$limits = $wpdb->prepare( 'LIMIT %d, %d', $number * ( $args['paged'] - 1 ), $number );
		}
	}

	if ( ! empty( $groupby ) ) {
		$groupby = " GROUP BY {$groupby} ";
	}
	if ( ! empty( $orderby ) ) {
		$orderby = " ORDER BY {$orderby} ";
	}

	// Create the mySQL statement.
	$sql = "SELECT $fields FROM {$wpdb->users} $join WHERE 1=1 $where $groupby $orderby $limits";

	$results = $wpdb->get_results( $sql ); // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching, WordPress.DB.PreparedSQL.NotPrepared

	/**
	 * Filter object containing list of popular authors and corresponding view counts.
	 *
	 * @since 1.0.0
	 *
	 * @param object $results List of popular authors and corresponding view counts.
	 * @param array  $args    Arguments list.
	 */
	return apply_filters( 'wzpa_get_popular_author_ids', $results, $args );
}


/**
 * Fills in missing query variables with default values.
 *
 * @since 1.0.0
 *
 * @param string|array $args {
 *     Optional. Array or string of default arguments.
 *
 *     @type int          $number           Maximum authors to return or display. Default empty (all authors).
 *     @type bool         $daily            Whether daily or overall counts. Default false.
 *     @type int          $daily_range      Daily range for custom period. Default null.
 *     @type int          $hour_range       Hour range for custom period. Default null.
 *     @type int          $offset           Number of authors to offset in retrieved results. Can be used in
 *                                          conjunction with pagination. Default 0.
 *     @type bool         $optioncount      Show the count in parenthesis next to the author's name. Default true.
 *     @type bool         $exclude_admin    Whether to exclude the 'admin' account, if it exists. Default false.
 *     @type bool         $show_fullname    Whether to show the author's full name. Default false.
 *     @type bool         $hide_empty       Whether to hide any authors with no posts. Default true.
 *     @type bool         $echo             Whether to output the result or instead return it. Default true.
 *     @type array|string $include          Array or comma/space-separated list of author IDs to include. Default empty.
 *     @type array|string $exclude          Array or comma/space-separated list of author IDs to exclude. Default empty.
 *     @type string       $before_list      HTML tag before the list. Default <ul>.
 *     @type string       $after_list       HTML tag after the list. Default </ul>.
 *     @type string       $before_list_item HTML tag before the list item. Default <li>.
 *     @type string       $after_list_item  HTML tag after the list item. Default </li>.
 * }
 * @return array Complete query variables with undefined ones filled in with defaults.
 */
function wzpa_list_popular_authors_args( $args = array() ) {

	$defaults = array(
		'number'           => '',
		'daily'            => false,
		'daily_range'      => null,
		'hour_range'       => null,
		'offset'           => '',
		'optioncount'      => true,
		'exclude_admin'    => false,
		'show_fullname'    => false,
		'hide_empty'       => true,
		'echo'             => true,
		'include'          => '',
		'exclude'          => '',
		'before_list'      => '<ul>',
		'after_list'       => '</ul>',
		'before_list_item' => '<li>',
		'after_list_item'  => '</li>',
	);

	return wp_parse_args( $args, $defaults );
}

