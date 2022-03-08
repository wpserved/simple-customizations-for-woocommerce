<?php

namespace SimpleWooCommerce\Settings\Sections;

use SimpleWooCommerce\Settings\Sections\BaseSection;

class Sample extends BaseSection
{
  public function __construct()
  {
    $this
      ->startGroup('Sample')
        ->addCheckbox(__('Checkbox', 'simple-woocommerce'), 'checkboxid')
        ->addTextInput(__('Text', 'simple-woocommerce'), 'textid')
        ->addNumberInput(__('Number', 'simple-woocommerce'), 'numberid')
        ->addSelectInput(__('Select', 'simple-woocommerce'), 'selectid')
      ->endGroup('Sample');
  }

  public function getId(): string
  {
    return 'sample';
  }

  public function getLabel(): string
  {
    return __('Sample', 'simple-woocommerce');
  }
}
