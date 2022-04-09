<?php
/**
 * Admin module
 *
 * @package Popular_Authors\Admin
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Display notices in the admin screen if Top 10 v3 is not installed.
 *
 * @since 1.1.0
 */
function wzpa_admin_notices() {
	global $pagenow;
	$admin_pages = array( 'index.php', 'plugins.php' );

	if ( ! function_exists( 'tptn_pop_posts' ) && in_array( $pagenow, $admin_pages, true ) ) {
		?>
		<div class="notice notice-warning">
			<p>
			<?php
			printf(
				/* translators: 1: Force regenerate plugin link. */
				esc_html__( 'Popular Authors requires Top 10 v3 or above. Please install %1$s via Plugins > Add New or deactivate this plugin.', 'top-10' ),
				'<a href="' . esc_url( network_admin_url( 'plugin-install.php?tab=plugin-information&amp;plugin=top-10&amp;TB_iframe=true&amp;width=600&amp;height=550' ) ) . '" class="thickbox">Top 10</a>'
			);
			?>
			</p>
		</div>
		<?php
	}
}
add_filter( 'admin_notices', 'wzpa_admin_notices' );
