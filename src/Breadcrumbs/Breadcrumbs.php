<?php

namespace SimpleCustomizationsForWooCommerce\Breadcrumbs;

class Breadcrumbs
{
  private const SETTINGS_FIELD_NAME = 'swc_general_breadcrumbs_show';

  /**
   * @action init
   */
  public function maybeRemove(): void
  {
    if ($this->shouldRemove()) {
      remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    }
  }

  private function shouldRemove(): bool
  {
    return 'no' === get_option($this::SETTINGS_FIELD_NAME, true);
  }
}
