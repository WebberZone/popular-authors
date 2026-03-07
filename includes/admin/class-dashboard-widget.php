<?php
/**
 * Dashboard Widget class.
 *
 * @package WebberZone\Popular_Authors\Admin
 */

namespace WebberZone\Popular_Authors\Admin;

use WebberZone\Popular_Authors\Frontend\Display;
use WebberZone\Popular_Authors\Util\Hook_Registry;

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Dashboard Widget class.
 *
 * @since 1.4.0
 */
class Dashboard_Widget {

	/**
	 * Constructor class.
	 *
	 * @since 1.4.0
	 */
	public function __construct() {
		Hook_Registry::add_action( 'wp_dashboard_setup', array( $this, 'add_dashboard_widget' ) );
		Hook_Registry::add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
	}

	/**
	 * Add the dashboard widget.
	 *
	 * @since 1.4.0
	 */
	public function add_dashboard_widget() {
		wp_add_dashboard_widget(
			'wzpa_dashboard_widget',
			__( 'Top Authors', 'popular-authors' ),
			array( $this, 'render_dashboard_widget' )
		);
	}

	/**
	 * Render the dashboard widget content.
	 *
	 * @since 1.4.0
	 */
	public function render_dashboard_widget() {
		$args = array(
			'number'        => 10,
			'optioncount'   => true,
			'show_avatar'   => true,
			'show_fullname' => false,
			'cache'         => true,
			'echo'          => false,
		);

		$args = apply_filters( 'wzpa_dashboard_widget_args', $args );

		$output = Display::list_popular_authors( $args );

		if ( empty( $output ) ) {
			echo '<p>' . esc_html__( 'No authors found.', 'popular-authors' ) . '</p>';
			return;
		}

		echo '<div class="wzpa-dashboard-widget">';
		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		echo '</div>';

		$settings_url = admin_url( 'admin.php?page=tptn_options_page#popular-authors' );
		echo '<p class="wzpa-dashboard-footer">';
		echo '<a href="' . esc_url( $settings_url ) . '">' . esc_html__( 'Configure Popular Authors Settings', 'popular-authors' ) . '</a>';
		echo '</p>';
	}

	/**
	 * Enqueue styles for the dashboard widget.
	 *
	 * @since 1.4.0
	 *
	 * @param string $hook Current admin page hook.
	 */
	public function enqueue_styles( $hook ) {
		if ( 'index.php' !== $hook ) {
			return;
		}

		$min_suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style(
			'wzpa-dashboard-widget',
			plugins_url( "includes/admin/css/dashboard-widget{$min_suffix}.css", POP_AUTHOR_PLUGIN_FILE ),
			array(),
			POP_AUTHOR_VERSION
		);
	}
}
