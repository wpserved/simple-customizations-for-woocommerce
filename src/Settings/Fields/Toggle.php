<?php

namespace SimpleCustomizationsForWooCommerce\Settings\Fields;

use WC_Admin_Settings;

class Toggle
{
  /**
   * @action woocommerce_admin_field_toggle
   *
   * @see WC_Admin_Settings::output_fields(...) - checkbox
   */
  public function renderToggleSwitch(array $data): void
  {
    $field_description = WC_Admin_Settings::get_field_description($data);
    $description = $field_description['description'];
    $tooltip_html = $field_description['tooltip_html'];

    $custom_attributes = [];

    if (! empty($value['custom_attributes']) && is_array($value['custom_attributes'])) {
      foreach ($value['custom_attributes'] as $attribute => $attribute_value) {
        $custom_attributes[] = $attribute . '="' . $attribute_value . '"';
      }
    }

    $option_value = $data['value'];
    $visibility_class = [];

    if (! isset($data['hide_if_checked'])) {
      $data['hide_if_checked'] = false;
    }
    if (! isset($data['show_if_checked'])) {
      $data['show_if_checked'] = false;
    }
    if ('yes' === $data['hide_if_checked'] || 'yes' === $data['show_if_checked']) {
      $visibility_class[] = 'hidden_option';
    }
    if ('option' === $data['hide_if_checked']) {
      $visibility_class[] = 'hide_options_if_checked';
    }
    if ('option' === $data['show_if_checked']) {
      $visibility_class[] = 'show_options_if_checked';
    }

    if (! isset($data['checkboxgroup']) || 'start' === $data['checkboxgroup']) {
      ?>
        <tr valign="top" class="<?php echo esc_attr(implode(' ', $visibility_class)); ?>">
          <th scope="row" class="titledesc"><?php echo esc_html($data['title']); ?></th>
          <td class="forminp forminp-checkbox">
            <fieldset>
      <?php
    } else {
      ?>
        <fieldset class="<?php echo esc_attr(implode(' ', $visibility_class)); ?>">
      <?php
    }

    if (! empty($data['title'])) {
      ?>
        <legend class="screen-reader-text"><span><?php echo esc_html($data['title']); ?></span></legend>
      <?php
    }

    ?>
      <label for="<?php echo esc_attr($data['id']); ?>" class="toggle-switch">
        <input
          name="<?php echo esc_attr($data['id']); ?>"
          id="<?php echo esc_attr($data['id']); ?>"
          type="checkbox"
          class="<?php echo esc_attr(isset($data['class']) ? $data['class'] : ''); ?>"
          value="1"
          <?php checked($option_value, 'yes'); ?>
          <?php echo esc_attr(implode(' ', $custom_attributes)); ?>
        /> <span class="switch-slider <?php echo esc_attr(isset($data['toggle_type']) && 'round' === $data['toggle_type'] ? 'round' : ''); ?>"></span> <?php echo wp_kses($description, array('p' => array('class'=>array()))); ?>
      </label> <?php echo esc_html($tooltip_html); ?>
    <?php

    if (! isset($data['checkboxgroup']) || 'end' === $data['checkboxgroup']) {
      ?>
            </fieldset>
          </td>
        </tr>
      <?php
    } else {
      ?>
        </fieldset>
      <?php
    }
  }

  /**
   * @filter woocommerce_admin_settings_sanitize_option
   */
  public function sanitizeValues($value, $option, $raw_value)
  {
    if ('toggle' !== $option['type']) {
      return $value;
    }

    return '1' === $raw_value || 'yes' === $raw_value ? 'yes' : 'no';
  }
}
