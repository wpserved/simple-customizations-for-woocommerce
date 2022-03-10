<?php

namespace SimpleCustomizationsForWooCommerce\Settings\Sections;

use SimpleCustomizationsForWooCommerce\Settings\Sections\BaseSection;

class Sample extends BaseSection
{
  public function __construct()
  {
    $this
      ->startGroup('Sample')
        ->addCheckbox(__('Checkbox', 'simple-customizations-for-woocommerce'), 'checkboxid')
        ->addTextInput(__('Text', 'simple-customizations-for-woocommerce'), 'textid')
        ->addNumberInput(__('Number', 'simple-customizations-for-woocommerce'), 'numberid')
        ->addSelectInput(__('Select', 'simple-customizations-for-woocommerce'), 'selectid')
      ->endGroup('Sample');
  }

  public function getId(): string
  {
    return 'sample';
  }

  public function getLabel(): string
  {
    return __('Sample', 'simple-customizations-for-woocommerce');
  }
}
