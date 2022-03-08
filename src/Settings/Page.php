<?php

namespace SimpleWooCommerce\Settings;

use SimpleWooCommerce\Settings\Sections\SectionAccess;
use SimpleWooCommerce\Settings\Sections\General as GeneralSection;
use SimpleWooCommerce\Settings\Sections\Sample;

class Page extends \WC_Settings_Page
{
  private array $sections = [];

  public function __construct()
  {
    $this->id = 'swc';
    $this->label = 'Simple WooCommerce';
    $this->sections = [
      'general' => new GeneralSection(),
    ];

    parent::__construct();
  }

  protected function get_own_sections(): array // phpcs:ignore
  {
    return array_map(fn (SectionAccess $section) => $section->getLabel(), $this->sections);
  }

  protected function get_settings_for_default_section(): array // phpcs:ignore
  {
    return $this->sections['general']->getSettings();
  }

  protected function get_settings_for_general_section(): array // phpcs:ignore
  {
    return $this->sections['general']->getSettings();
  }
}
