<?php
/**
 * Plugin Name: Simple WooCommerce
 * Plugin URI: https://wpserved.com/plugins
 * Description: Simplify your WooCommerce store easily!
 * Version: 1.0.0
 * Author: wpserved
 * Author URI: https://wpserved.com/
 * Text Domain: simple-woocommerce
 * Domain Path: /resources/lang
 * Requires at least: 5.8
 * Requires PHP: 7.4
 */

define('SIMPLE_WOOCOMMERCE_ROOT_PATH', dirname(__FILE__));
define('SIMPLE_WOOCOMMERCE_ASSETS_PATH', dirname(__FILE__) . '/dist');
define('SIMPLE_WOOCOMMERCE_RESOURCES_PATH', dirname(__FILE__) . '/resources');
define('SIMPLE_WOOCOMMERCE_ASSETS_URI', plugin_dir_url(__FILE__) . 'dist');
define('SIMPLE_WOOCOMMERCE_RESOURCES_URI', plugin_dir_url(__FILE__) . 'resources');

require SIMPLE_WOOCOMMERCE_ROOT_PATH . '/inc/bootstrap.php';
