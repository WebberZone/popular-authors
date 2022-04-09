<?php
/**
 * Popular Authors.
 *
 * Display a list of the popular authors. A Top 10 WordPress plugin addon.
 *
 * @package   Popular_Authors
 * @author    Ajay D'Souza
 * @license   GPL-2.0+
 * @link      https://webberzone.com
 * @copyright 2020-2022 WebberZone
 *
 * @wordpress-plugin
 * Plugin Name: Popular Authors
 * Plugin URI:  https://webberzone.com/downlods/popular-authors/
 * Description: Display a list of the popular authors. A Top 10 WordPress plugin addon.
 * Version:     1.1.0-beta1
 * Author:      Ajay D'Souza
 * Author URI:  https://webberzone.com
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: popular-authors
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Popular Authors Plugin Version
 *
 * @since 1.1.0
 *
 * @var string Plugin folder path
 */
if ( ! defined( 'POP_AUTHOR_VERSION' ) ) {
	define( 'POP_AUTHOR_VERSION', '1.1.0' );
}

/**
 * Holds the filesystem directory path (with trailing slash) for Popular Authors
 *
 * @since 1.1.0
 *
 * @var string Plugin folder path
 */
if ( ! defined( 'POP_AUTHOR_PLUGIN_DIR' ) ) {
	define( 'POP_AUTHOR_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
}

/**
 * Holds the filesystem directory path (with trailing slash) for Popular Authors
 *
 * @since 1.1.0
 *
 * @var string Plugin folder URL
 */
if ( ! defined( 'POP_AUTHOR_PLUGIN_URL' ) ) {
	define( 'POP_AUTHOR_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}

/**
 * Holds the filesystem directory path (with trailing slash) for Popular Authors
 *
 * @since 1.1.0
 *
 * @var string Plugin Root File
 */
if ( ! defined( 'POP_AUTHOR_PLUGIN_FILE' ) ) {
	define( 'POP_AUTHOR_PLUGIN_FILE', __FILE__ );
}


/*
 *---------------------------------------------------------------------------*
 * Modules
 *---------------------------------------------------------------------------*
 */

require_once POP_AUTHOR_PLUGIN_DIR . 'includes/main.php';
require_once POP_AUTHOR_PLUGIN_DIR . 'includes/blocks/register-blocks.php';
require_once POP_AUTHOR_PLUGIN_DIR . 'includes/shortcode.php';
require_once POP_AUTHOR_PLUGIN_DIR . 'includes/class-popular-authors-widget.php';
require_once POP_AUTHOR_PLUGIN_DIR . 'includes/i10n.php';
