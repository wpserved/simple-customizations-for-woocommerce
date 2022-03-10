<?php

namespace SimpleCustomizationsForWooCommerce;

use SimpleCustomizationsForWooCommerce\Core\Singleton;

class Init extends Singleton
{
  public array $public = [];

  public array $private = [];

  public function __construct()
  {
    $this->addPrivate('Core\Config');

    $this->addPrivate('Product\Product');
    $this->addPrivate('Breadcrumbs\Breadcrumbs');
    $this->addPrivate('ProductList\ProductList');
    $this->addPrivate('Settings\Settings');
  }

  private function addPublic(string $name, string $label = ''): void
  {
    $class = 'SimpleCustomizationsForWooCommerce\\' . $name;
    $index = ! empty($label) ? $label : $name;
    $this->public[$index] = new $class();
    swcDoc()->addDocHooks($this->public[$index]);
  }

  private function addPrivate(string $name, string $label = ''): void
  {
    $class = 'SimpleCustomizationsForWooCommerce\\' . $name;
    $index = ! empty($label) ? $label : $name;
    $this->private[$index] = new $class();
    swcDoc()->addDocHooks($this->private[$index]);
  }
}
