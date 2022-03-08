<?php

namespace SimpleWooCommerce\Core;

use SimpleWooCommerce\Product\Product;

class Config
{
  /**
   * @action plugins_loaded
   */
  public function initConfig(): void
  {
    load_textdomain('simple-woocommerce', SIMPLE_WOOCOMMERCE_RESOURCES_PATH . '/lang/' . get_locale() . '.mo');
  }

  /**
   * @action wp_enqueue_scripts
   */
  public function dependencies(): void
  {
    $version = 'production' === wp_get_environment_type() ? null : time();

    wp_enqueue_style('simple-woocommerce/front.css', SIMPLE_WOOCOMMERCE_ASSETS_URI . '/styles/front.css', false, $version);
    wp_enqueue_script('simple-woocommerce/manifest.js', SIMPLE_WOOCOMMERCE_ASSETS_URI . '/scripts/manifest.js', ['jquery'], $version, true);
    wp_enqueue_script('simple-woocommerce/vendor.js', SIMPLE_WOOCOMMERCE_ASSETS_URI . '/scripts/vendor.js', ['simple-woocommerce/manifest.js'], $version, true);
    wp_enqueue_script('simple-woocommerce/front.js', SIMPLE_WOOCOMMERCE_ASSETS_URI . '/scripts/front.js', ['simple-woocommerce/manifest.js'], $version, true);

    wp_localize_script('simple-woocommerce/front.js', 'swc', [
      'ajax' => admin_url('admin-ajax.php'),
    ]);
  }

  /**
   * @action admin_enqueue_scripts
   */
  public function adminDependencies(): void
  {
    $version = 'production' === wp_get_environment_type() ? null : time();

    wp_enqueue_style('simple-woocommerce/admin.css', SIMPLE_WOOCOMMERCE_ASSETS_URI . '/styles/admin.css', false, $version);
    wp_enqueue_script('simple-woocommerce/manifest.js', SIMPLE_WOOCOMMERCE_ASSETS_URI . '/scripts/manifest.js', ['jquery'], $version, true);
    wp_enqueue_script('simple-woocommerce/vendor.js', SIMPLE_WOOCOMMERCE_ASSETS_URI . '/scripts/vendor.js', ['simple-woocommerce/manifest.js'], $version, true);
    wp_enqueue_script('simple-woocommerce/admin.js', SIMPLE_WOOCOMMERCE_ASSETS_URI . '/scripts/admin.js', ['simple-woocommerce/manifest.js'], $version, true);

    wp_localize_script('simple-woocommerce/admin.js', 'swc', [
      'ajax' => admin_url('admin-ajax.php')
    ]);
  }

  /**
   * @filter plugin_action_links_simple-woocommerce/simple-woocommerce.php
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
    $settings_link = "<a href='$url'>" . __('Settings', 'simple-woocommerce') . '</a>';
    array_push(
        $links,
        $settings_link
    );

    return $links;
  }
}
