<?php
/**
 * Plugin Name: Simple Customizations for WooCommerce
 * Plugin URI: https://wpserved.com/plugins
 * Description: Simplify your WooCommerce store easily!
 * Version: 1.0.1
 * Author: wpserved
 * Author URI: https://wpserved.com/
 * Text Domain: simple-customizations-for-woocommerce
 * Domain Path: /resources/lang
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

define('SCW_ROOT_PATH', dirname(__FILE__));
define('SCW_ASSETS_PATH', dirname(__FILE__) . '/dist');
define('SCW_RESOURCES_PATH', dirname(__FILE__) . '/resources');
define('SCW_ASSETS_URI', plugin_dir_url(__FILE__) . 'dist');
define('SCW_RESOURCES_URI', plugin_dir_url(__FILE__) . 'resources');

require SCW_ROOT_PATH . '/inc/bootstrap.php';
