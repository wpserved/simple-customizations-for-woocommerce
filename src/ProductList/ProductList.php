<?php

namespace SimpleCustomizationsForWooCommerce\ProductList;

class ProductList
{
  private const PRICE_SETTINGS_FIELD_NAME = 'swc_general_product_list_prices_show';

  private const PRODUCT_COUNTER_FIELD_NAME = 'swc_general_product_list_count_show';

  private const ORDERING_SETTINGS_FIELD_NAME = 'swc_general_ordering_show';

  private const REMOVE_ADD_TO_CART_SETTINGS_FIELD_NAMES = [
    'category' => 'swc_general_add_to_cart_category_hide',
    'archive' => 'swc_general_add_to_cart_archive_hide',
    'tag' => 'swc_general_add_to_cart_tag_hide',
  ];

  /**
   * @action init
   */
  public function maybeRemoveProductCounter(): void
  {
    if (! $this->shouldDisplayProductCounter()) {
      remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
    }
  }

  /**
   * @filter woocommerce_get_price_html
   */
  public function maybeHidePrice(string $price): string
  {
    return (is_post_type_archive() || is_tax()) && $this->shouldHidePrice() ? '' : $price;
  }

  /**
   * @action before_woocommerce_init
   */
  public function maybeRemoveOrderingDropdown(): void
  {
    if ($this->shouldRemoveDropdown()) {
      remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
    }
  }

  /**
   * @action template_redirect
   */
  public function maybeRemoveArchiveAddToCartBtn(): void
  {
    if (is_post_type_archive() && $this->shouldRemoveAddToCartBtn('archive')) {
      remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
      return;
    }

    if (is_tax('product_tag') && $this->shouldRemoveAddToCartBtn('tag')) {
      remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
      return;
    }

    if (is_tax() && ! is_tax('product_tag') && $this->shouldRemoveAddToCartBtn('category')) {
      remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
      return;
    }
  }

  private function shouldRemoveDropdown(): bool
  {
    return 'no' === get_option($this::ORDERING_SETTINGS_FIELD_NAME, true);
  }

  private function shouldRemoveAddToCartBtn(string $page_type = ''): bool
  {
    if (! array_key_exists($page_type, $this::REMOVE_ADD_TO_CART_SETTINGS_FIELD_NAMES)) {
      return false;
    }

    return 'yes' === get_option($this::REMOVE_ADD_TO_CART_SETTINGS_FIELD_NAMES[$page_type], true);
  }

  private function shouldHidePrice(): bool
  {
    return 'no' === get_option($this::PRICE_SETTINGS_FIELD_NAME, true);
  }

  private function shouldDisplayProductCounter(): bool
  {
    return 'yes' === get_option($this::PRODUCT_COUNTER_FIELD_NAME);
  }
}
