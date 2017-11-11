<?php
/**
 * Plugin Name:       REPLACE_PLUGIN_NAME
 * Plugin URI:        REPLACE_PLUGIN_URI
 * Description:       REPLACE_PLUGIN_DESCRIPTION
 * Version:           1.0.0
 * Author:            REPLACE_PLUGIN_AUTHOR
 * Author URI:        REPLACE_PLUGIN_AUTHOR_URI
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define('REPLACE_PLUGIN_NAMESPACE_PLUGIN_VERSION', '1.0.0');
define('REPLACE_PLUGIN_NAMESPACE_PLUGIN_PATH', dirname(__FILE__));
define('REPLACE_PLUGIN_NAMESPACE_TEMPLATES', dirname(__FILE__) . '/templates/');
define('REPLACE_PLUGIN_NAMESPACE_PLUGIN_NAME', dirname(plugin_basename( __FILE__ )));
define('REPLACE_PLUGIN_NAMESPACE_PLUGIN_URL', plugins_url(REPLACE_PLUGIN_NAMESPACE_PLUGIN_NAME . '/'));
define('REPLACE_PLUGIN_NAMESPACE_ASSETS_URL', REPLACE_PLUGIN_NAMESPACE_PLUGIN_URL . 'assets/');

// show all errors while developing
if (WP_DEBUG) {
	ini_set('display_errors', '1');
	error_reporting(E_ALL);
}

// import composer autoload file
require_once __DIR__ . '/vendor/autoload.php';

// show pretty error web-interface if WP_DEBUG is true
if (WP_DEBUG && class_exists('\\Whoops\\Run')) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
}

$plugin = \REPLACE_PLUGIN_NAMESPACE\Plugin::getInstance();

// register_activation_hook( __FILE__, [$plugin, 'activatePlugin'] );
// register_deactivation_hook( __FILE__, [$plugin, 'deactivatePlugin'] );

// TODO: https://github.com/deliciousbrains/wp-plugin-build
