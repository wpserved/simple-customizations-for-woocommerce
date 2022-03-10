<?php

namespace SimpleCustomizationsForWooCommerce\Settings\Sections;

use SimpleCustomizationsForWooCommerce\Settings\Sections\BaseSection;

class General extends BaseSection
{
  public function __construct()
  {
    $this
      ->startGroup(__('General', 'simple-customizations-for-woocommerce'), 'general')
        ->addToggle(__('Breadcrumbs', 'simple-customizations-for-woocommerce'), 'breadcrumbs_show', [
          'desc' => __('Show breadcrumbs', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Ordering products', 'simple-customizations-for-woocommerce'), 'ordering_show', [
          'desc' => __('Show "Sort by ..." select', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product list count', 'simple-customizations-for-woocommerce'), 'product_list_count_show', [
          'desc' => __('Show product list count', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Price on product list', 'simple-customizations-for-woocommerce'), 'product_list_prices_show', [
          'desc' => __('Show prices on product list', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])

        ->addToggle('"Add to cart" button', 'add_to_cart_category_hide', [
          'desc' => __('Disable "Add to cart" button on category pages.', 'simple-customizations-for-woocommerce'),
          'checkboxgroup' => 'start',
          'default' => 'no',
        ])
        ->addToggle('', 'add_to_cart_archive_hide', [
          'desc' => __('Disable "Add to cart" button on archive pages.', 'simple-customizations-for-woocommerce'),
          'checkboxgroup' => '',
          'default' => 'no',
        ])
        ->addToggle('', 'add_to_cart_tag_hide', [
          'desc' => __('Disable "Add to cart" button on product tag pages.', 'simple-customizations-for-woocommerce'),
          'checkboxgroup' => 'end',
          'default' => 'no',
        ])

        ->addTextInput(__('Custom "Add to cart" button text', 'simple-customizations-for-woocommerce'), 'add_to_cart_text', [
          'desc' => __('Leave empty for default text or type in a custom text', 'simple-customizations-for-woocommerce'),
          'placeholder' => __('Type in "Add to cart" button text here...', 'simple-customizations-for-woocommerce'),
        ])
        ->addTextInput(__('Custom "Read more" button text', 'simple-customizations-for-woocommerce'), 'read_more_text', [
          'desc' => __('This will be displayed if a product is, for example, out of stock. Leave empty for default text', 'simple-customizations-for-woocommerce'),
          'placeholder' => __('Type in "Read more" button text here...', 'simple-customizations-for-woocommerce'),
        ])

        ->addToggle(__('Product tabs', 'simple-customizations-for-woocommerce'), 'product_view_tabs_enabled', [
          'desc' => __('Allow tabs on product page and display content in them', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product description header', 'simple-customizations-for-woocommerce'), 'product_view_desc_header_show', [
          'desc' => __('Show default header for product "long" description', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product category', 'simple-customizations-for-woocommerce'), 'product_category_show', [
          'desc' => __('Show product category under "Add to cart" button', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Related products', 'simple-customizations-for-woocommerce'), 'related_products_show', [
          'desc' => __('Show related products on product page', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product short description', 'simple-customizations-for-woocommerce'), 'product_short_desc_show', [
          'desc' => __('Show product short description on product page', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product additional information', 'simple-customizations-for-woocommerce'), 'product_additional_info_show', [
          'desc' => __('Show additional information tab/section', 'simple-customizations-for-woocommerce'),
          'default' => 'yes',
        ])
      ->endGroup('general');
  }

  public function getId(): string
  {
    return 'general';
  }

  public function getLabel(): string
  {
    return __('General', 'simple-customizations-for-woocommerce');
  }
}
