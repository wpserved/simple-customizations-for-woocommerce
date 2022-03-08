<?php

require SIMPLE_WOOCOMMERCE_ROOT_PATH . '/vendor/autoload.php';

if (! function_exists('swcDoc') && function_exists('SimpleWooCommerce\\swcDoc')) {
  /**
   * Initialize swcDoc() function.
   *
   * @return object
   */
  function swcDoc(): object
  {
    return SimpleWooCommerce\swcDoc();
  }
}

if (! function_exists('swc') && function_exists('SimpleWooCommerce\\swc')) {
  /**
   * Initialize swc() function.
   *
   * @param string $moduleName
   * @return object
   */
  function swc(string $moduleName = ''): object
  {
    return SimpleWooCommerce\swc($moduleName);
  }
}

if (! function_exists('createClass') && function_exists('SimpleWooCommerce\\createClass')) {
  /**
   * Initialize createClass() function.
   *
   * @param string $class
   * @param array $params
   * @return object
   */
  function createClass(string $class, array $params = array()): object
  {
    $object = new $class(...$params);
    swcDoc()->addDocHooks($object);
    return $object;
  }
}

if (! function_exists('errorLog')) {
  /**
   * Log error to debug file and print to screen when debug mode enabled.
   *
   * @param \Throwable $error
   * @return void
   */
  function errorLog(\Throwable $error): void
  {
    error_log($error);
    if (defined('WP_DEBUG') && true === WP_DEBUG && defined('WP_DEBUG_DISPLAY') && true === WP_DEBUG_DISPLAY) {
      dump($error);
    }
  }
}

swcDoc();
swc();
