<?php

namespace SimpleCustomizationsForWooCommerce\Product;

use WC_Product_Simple;

class Product
{
  private const TABS_FIELD_NAME = 'swc_general_product_view_tabs_enabled';

  private const LONG_DESC_HEADER_FIELD_NAME = 'swc_general_product_view_desc_header_show';

  private const ADD_TO_CART_TEXT_FIELD_NAME = 'swc_general_add_to_cart_text';

  private const READ_MORE_TEXT_FIELD_NAME = 'swc_general_read_more_text';

  private const HIDE_CATEGORIES_FIELD_NAME = 'swc_general_product_category_show';

  private const RELATED_PRODUCTS_FIELD_NAME = 'swc_general_related_products_show';

  private const SHORT_DESC_FIELD_NAME = 'swc_general_product_short_desc_show';

  private const ADDITIONAL_INFO_FIELD_NAME = 'swc_general_product_additional_info_show';

  /**
   * @filter woocommerce_product_add_to_cart_text
   * @filter woocommerce_product_single_add_to_cart_text
   */
  public function maybeChangeAddToCartText(string $text, WC_Product_Simple $product = null): string
  {
    if (null !== $product) {
      return $product->is_purchasable() && $product->is_in_stock() ? $this->maybeReplaceAddToCartText($text) : $this->maybeReplaceReadMoreText($text);
    }

    return $this->maybeReplaceAddToCartText($text);
  }

  /**
   * @filter woocommerce_product_tabs 20
   */
  public function maybeRemoveAdditionalInfoTab(array $tabs): array
  {
    if (! $this->shouldDisplayAdditionalInfo()) {
      unset($tabs['additional_information']);
    }

    return $tabs;
  }

  /**
   * @action init
   */
  public function maybeRemoveRelatedProducts(): void
  {
    if (! $this->shouldDisplayRelatedProducts()) {
      remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    }
  }

  /**
   * @action init
   */
  public function maybeRemoveShortDesc(): void
  {
    if (! $this->shouldDisplayShortDesc()) {
      remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    }
  }

  private function maybeReplaceAddToCartText(string $currentText): string
  {
    $newText = get_option($this::ADD_TO_CART_TEXT_FIELD_NAME);

    return empty($newText) ? $currentText : $newText;
  }

  private function maybeReplaceReadMoreText(string $currentText): string
  {
    $newText = get_option($this::READ_MORE_TEXT_FIELD_NAME);

    return empty($newText) ? $currentText : $newText;
  }

  private function shouldDisplayAdditionalInfo(): bool
  {
    return 'yes' === get_option(self::ADDITIONAL_INFO_FIELD_NAME);
  }

  private function shouldDisplayRelatedProducts(): bool
  {
    return 'yes' === get_option(self::RELATED_PRODUCTS_FIELD_NAME);
  }

  private function shouldDisplayShortDesc(): bool
  {
    return 'yes' === get_option(self::SHORT_DESC_FIELD_NAME);
  }

  public static function shouldDisplayCategories(): bool
  {
    return 'yes' === get_option(self::HIDE_CATEGORIES_FIELD_NAME);
  }

  public static function shouldRemoveDescriptionHeader(): bool
  {
    return 'yes' !== get_option(self::LONG_DESC_HEADER_FIELD_NAME);
  }

  private static function shouldRemoveTabs(): bool
  {
    return 'no' === get_option(self::TABS_FIELD_NAME);
  }

  public function getConfig(): array
  {
    return [
      'hideProductCategories' => ! self::shouldDisplayCategories(),
      'removeTabs' => self::shouldRemoveTabs(),
      'removeDescriptionHeader' => self::shouldRemoveDescriptionHeader(),
    ];
  }

  /**
   * @filter body_class
   */
  public function addBodyClasses(array $classes, array $additional_classes): array
  {
    foreach ($this->getConfig() as $feature => $value) {
      if ($value) {
        $classes[] = strtolower(preg_replace('/([a-z])([A-Z])/', '$1-$2', $feature));
      }
    }

    return $classes;
  }
}
