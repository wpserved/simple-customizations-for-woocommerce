<?php

namespace SimpleWooCommerce;

use SimpleWooCommerce\Init;
use SimpleWooCommerce\Core\DocHooks;

if (! function_exists('SimpleWooCommerce\\swcDoc')) {
  function swcDoc()
  {
    return DocHooks::get();
  }
}

if (! function_exists('SimpleWooCommerce\\swc')) {
  function swc(string $moduleName = '')
  {
    $modules = Init::get();
    if ('' === $moduleName) {
      return $modules;
    }
    if (! array_key_exists($moduleName, $modules->public)) {
      throw new \Exception(sprintf(__('Module %1$s doesn\'t exists!', 'simple-woocommerce'), $moduleName));
    }
    return $modules->public[$moduleName];
  }
}

if (! function_exists('SimpleWooCommerce\\createClass')) {
  /**
   * Create instance of Class
   *
   * @see https://gist.github.com/nikic/6390366
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
