<?php

namespace SimpleCustomizationsForWooCommerce\Settings;

use SimpleCustomizationsForWooCommerce\Settings\Fields\Toggle;
use SimpleCustomizationsForWooCommerce\Settings\Page;

class Settings
{
  public function __construct()
  {
    createClass(Toggle::class);
  }

  /**
   * @filter woocommerce_get_settings_pages
   */
  public function addSettingsPage(array $settings): array
  {
    $settings[] = new Page();

    return $settings;
  }

  public function getSetting(string $key)
  {
    return ! empty($key) ? get_option("swc_{$key}") : '';
  }
}
