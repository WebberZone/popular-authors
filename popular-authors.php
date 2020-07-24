<?php
/**
 * Popular Authors.
 *
 * Show a list of the popular authors using the widget or shortcode. A Top 10 WordPress plugin addon.
 *
 * @package   Popular_Authors
 * @author    Ajay D'Souza
 * @license   GPL-2.0+
 * @link      https://webberzone.com
 * @copyright 2020 WebberZone
 *
 * @wordpress-plugin
 * Plugin Name: Popular Authors
 * Plugin URI:  https://webberzone.com/downlods/popular-authors/
 * Description: Show a list of the popular authors using the widget or shortcode. A Top 10 WordPress plugin addon.
 * Version:     1.0.1-beta1
 * Author:      Ajay D'Souza
 * Author URI:  https://webberzone.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: top-10-fast-tracker
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Holds the filesystem directory path (with trailing slash) for Top 10
 *
 * @since 1.0.0
 *
 * @var string Plugin folder path
 */
if ( ! defined( 'POP_AUTH_PLUGIN_DIR' ) ) {
	define( 'POP_AUTH_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

/**
 * Holds the filesystem directory path (with trailing slash) for Top 10
 *
 * @since 1.0.0
 *
 * @var string Plugin folder URL
 */
if ( ! defined( 'POP_AUTH_PLUGIN_URL' ) ) {
	define( 'POP_AUTH_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * Holds the filesystem directory path (with trailing slash) for Top 10
 *
 * @since 1.0.0
 *
 * @var string Plugin Root File
 */
if ( ! defined( 'POP_AUTH_PLUGIN_FILE' ) ) {
	define( 'POP_AUTH_PLUGIN_FILE', __FILE__ );
}


/*
 *---------------------------------------------------------------------------*
 * Modules
 *---------------------------------------------------------------------------*
 */

require_once POP_AUTH_PLUGIN_DIR . 'includes/main.php';
require_once POP_AUTH_PLUGIN_DIR . 'includes/shortcode.php';
require_once POP_AUTH_PLUGIN_DIR . 'includes/class-popular-authors-widget.php';
require_once POP_AUTH_PLUGIN_DIR . 'includes/i10n.php';
