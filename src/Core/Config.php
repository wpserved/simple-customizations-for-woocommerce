<?php

namespace SimpleCustomizationsForWooCommerce\Core;

use SimpleCustomizationsForWooCommerce\Product\Product;

class Config
{
  /**
   * @action plugins_loaded
   */
  public function initConfig(): void
  {
    load_textdomain('simple-customizations-for-woocommerce', SCW_RESOURCES_PATH . '/lang/' . get_locale() . '.mo');
  }

  /**
   * @action wp_enqueue_scripts
   */
  public function dependencies(): void
  {
    $version = 'production' === wp_get_environment_type() ? null : time();

    wp_enqueue_style('simple-customizations-for-woocommerce/front.css', SCW_ASSETS_URI . '/styles/front.css', false, $version);
    wp_enqueue_script('simple-customizations-for-woocommerce/manifest.js', SCW_ASSETS_URI . '/scripts/manifest.js', ['jquery'], $version, true);
    wp_enqueue_script('simple-customizations-for-woocommerce/vendor.js', SCW_ASSETS_URI . '/scripts/vendor.js', ['simple-customizations-for-woocommerce/manifest.js'], $version, true);
    wp_enqueue_script('simple-customizations-for-woocommerce/front.js', SCW_ASSETS_URI . '/scripts/front.js', ['simple-customizations-for-woocommerce/manifest.js'], $version, true);

    wp_localize_script('simple-customizations-for-woocommerce/front.js', 'swc', [
      'ajax' => admin_url('admin-ajax.php'),
    ]);
  }

  /**
   * @action admin_enqueue_scripts
   */
  public function adminDependencies(): void
  {
    $version = 'production' === wp_get_environment_type() ? null : time();

    wp_enqueue_style('simple-customizations-for-woocommerce/admin.css', SCW_ASSETS_URI . '/styles/admin.css', false, $version);
    wp_enqueue_script('simple-customizations-for-woocommerce/manifest.js', SCW_ASSETS_URI . '/scripts/manifest.js', ['jquery'], $version, true);
    wp_enqueue_script('simple-customizations-for-woocommerce/vendor.js', SCW_ASSETS_URI . '/scripts/vendor.js', ['simple-customizations-for-woocommerce/manifest.js'], $version, true);
    wp_enqueue_script('simple-customizations-for-woocommerce/admin.js', SCW_ASSETS_URI . '/scripts/admin.js', ['simple-customizations-for-woocommerce/manifest.js'], $version, true);

    wp_localize_script('simple-customizations-for-woocommerce/admin.js', 'swc', [
      'ajax' => admin_url('admin-ajax.php')
    ]);
  }

  /**
   * @filter plugin_action_links_simple-customizations-for-woocommerce/simple-customizations-for-woocommerce.php
   */
  public function settingsLink($links)
  {
    $url = esc_url(add_query_arg(
        [
          'page' => 'wc-settings',
          'tab' => 'swc',
          'section' => 'general',
        ],
        get_admin_url() . 'admin.php'
    ));
    $settings_link = "<a href='$url'>" . __('Settings', 'simple-customizations-for-woocommerce') . '</a>';
    array_push(
        $links,
        $settings_link
    );

    return $links;
  }
}
