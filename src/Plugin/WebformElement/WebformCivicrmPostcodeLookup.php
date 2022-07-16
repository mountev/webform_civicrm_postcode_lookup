<?php

namespace Drupal\webform_civicrm_postcode_lookup\Plugin\WebformElement;

use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformElement\TextBase;
use Drupal\webform\Plugin\WebformElementBase;
use Drupal\webform\WebformSubmissionInterface;

/**
 * Provides a 'webform_civicrm_postcode_lookup' element.
 *
 * @WebformElement(
 *   id = "webform_civicrm_postcode_lookup",
 *   label = @Translation("CiviCRM Postcode Lookup"),
 *   description = @Translation("Provides a postcode lookup element that populates CiviCRM address fields based on postcode search."),
 *   category = @Translation("Custom elements"),
 * )
 *
 * @see \Drupal\webform_civicrm_postcode_lookup\Element\WebformCivicrmPostcodeLookup
 * @see \Drupal\webform\Plugin\WebformElementBase
 * @see \Drupal\webform\Plugin\WebformElementInterface
 * @see \Drupal\webform\Annotation\WebformElement
 */
class WebformCivicrmPostcodeLookup extends TextBase {

  /**
   * {@inheritdoc}
   */
  protected function defineDefaultProperties() {
    return [
        // Form display.
        'input_mask' => '',
        'input_hide' => FALSE,
        // Form validation.
        'counter_type' => '',
        'counter_minimum' => NULL,
        'counter_minimum_message' => '',
        'counter_maximum' => NULL,
        'counter_maximum_message' => '',
      ] + parent::defineDefaultProperties() + $this->defineDefaultMultipleProperties();
  }

  /* ************************************************************************ */

  /**
   * {@inheritdoc}
   */
  public function prepare(array &$element, WebformSubmissionInterface $webform_submission = NULL) {
    if (!array_key_exists('#maxlength', $element)) {
      $element['#maxlength'] = 255;
    }
    parent::prepare($element, $webform_submission);
  }

}
