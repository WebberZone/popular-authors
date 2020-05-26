<?php
/**
 * Language functions
 *
 * @package Popular_Authors
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Initialises text domain for l10n.
 *
 * @since 1.0.0
 */
function wzpa_lang_init() {
	load_plugin_textdomain( 'popular-authors', false, dirname( plugin_basename( POP_AUTH_PLUGIN_FILE ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'wzpa_lang_init' );

