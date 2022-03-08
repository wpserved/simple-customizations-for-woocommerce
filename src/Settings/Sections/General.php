<?php

namespace SimpleWooCommerce\Settings\Sections;

use SimpleWooCommerce\Settings\Sections\BaseSection;

class General extends BaseSection
{
  public function __construct()
  {
    $this
      ->startGroup(__('General', 'simple-woocommerce'), 'general')
        ->addToggle(__('Breadcrumbs', 'simple-woocommerce'), 'breadcrumbs_show', [
          'desc' => __('Show breadcrumbs', 'simple-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Ordering products', 'simple-woocommerce'), 'ordering_show', [
          'desc' => __('Show "Sort by ..." select', 'simple-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product list count', 'simple-woocommerce'), 'product_list_count_show', [
          'desc' => __('Show product list count', 'simple-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Price on product list', 'simple-woocommerce'), 'product_list_prices_show', [
          'desc' => __('Show prices on product list', 'simple-woocommerce'),
          'default' => 'yes',
        ])

        ->addToggle('"Add to cart" button', 'add_to_cart_category_hide', [
          'desc' => __('Disable "Add to cart" button on category pages.', 'simple-woocommerce'),
          'checkboxgroup' => 'start',
          'default' => 'no',
        ])
        ->addToggle('', 'add_to_cart_archive_hide', [
          'desc' => __('Disable "Add to cart" button on archive pages.', 'simple-woocommerce'),
          'checkboxgroup' => '',
          'default' => 'no',
        ])
        ->addToggle('', 'add_to_cart_tag_hide', [
          'desc' => __('Disable "Add to cart" button on product tag pages.', 'simple-woocommerce'),
          'checkboxgroup' => 'end',
          'default' => 'no',
        ])

        ->addTextInput(__('Custom "Add to cart" button text', 'simple-woocommerce'), 'add_to_cart_text', [
          'desc' => __('Leave empty for default text or type in a custom text', 'simple-woocommerce'),
          'placeholder' => __('Type in "Add to cart" button text here...', 'simple-woocommerce'),
        ])
        ->addTextInput(__('Custom "Read more" button text', 'simple-woocommerce'), 'read_more_text', [
          'desc' => __('This will be displayed if a product is, for example, out of stock. Leave empty for default text', 'simple-woocommerce'),
          'placeholder' => __('Type in "Read more" button text here...', 'simple-woocommerce'),
        ])

        ->addToggle(__('Product tabs', 'simple-woocommerce'), 'product_view_tabs_enabled', [
          'desc' => __('Allow tabs on product page and display content in them', 'simple-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product description header', 'simple-woocommerce'), 'product_view_desc_header_show', [
          'desc' => __('Show default header for product "long" description', 'simple-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product category', 'simple-woocommerce'), 'product_category_show', [
          'desc' => __('Show product category under "Add to cart" button', 'simple-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Related products', 'simple-woocommerce'), 'related_products_show', [
          'desc' => __('Show related products on product page', 'simple-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product short description', 'simple-woocommerce'), 'product_short_desc_show', [
          'desc' => __('Show product short description on product page', 'simple-woocommerce'),
          'default' => 'yes',
        ])
        ->addToggle(__('Product additional information', 'simple-woocommerce'), 'product_additional_info_show', [
          'desc' => __('Show additional information tab/section', 'simple-woocommerce'),
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
    return __('General', 'simple-woocommerce');
  }
}
