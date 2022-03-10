<?php

namespace SimpleCustomizationsForWooCommerce\Settings\Sections;

interface SectionAccess
{
  public function getLabel(): string;

  public function getId(): string;

  public function getSettings(): array;
}
