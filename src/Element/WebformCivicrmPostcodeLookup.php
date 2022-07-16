<?php

namespace Drupal\webform_civicrm_postcode_lookup\Element;

use Drupal\Core\Render\Element;
use Drupal\Core\Render\Element\FormElement;
use Drupal\Core\Form\FormStateInterface;
//use Drupal\webform\Entity\Webform;

/**
 * Provides a 'webform_civicrm_postcode_lookup'.
 *
 * Webform elements are just wrappers around form elements, therefore every
 * webform element must have correspond FormElement.
 *
 * Below is the definition for a custom 'webform_civicrm_postcode_lookup' which just
 * renders a simple text field.
 *
 * @FormElement("webform_civicrm_postcode_lookup")
 *
 * @see \Drupal\Core\Render\Element\FormElement
 * @see https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Render%21Element%21FormElement.php/class/FormElement
 * @see \Drupal\Core\Render\Element\RenderElement
 * @see https://api.drupal.org/api/drupal/namespace/Drupal%21Core%21Render%21Element
 * @see \Drupal\webform_civicrm_postcode_lookup\Element\WebformCivicrmPostcodeLookup
 */
class WebformCivicrmPostcodeLookup extends FormElement {

  /**
   * {@inheritdoc}
   */
  public function getInfo() {
    $class = get_class($this);
    return [
      '#input' => TRUE,
      '#size' => 60,
      '#process' => [
        [$class, 'processWebformCivicrmPostcodeLookup'],
        [$class, 'processAjaxForm'],
      ],
      '#element_validate' => [
        [$class, 'validateWebformCivicrmPostcodeLookup'],
      ],
      '#pre_render' => [
        [$class, 'preRenderWebformCivicrmPostcodeLookup'],
      ],
      '#theme' => 'input__webform_civicrm_postcode_lookup',
      '#theme_wrappers' => ['form_element'],
    ];
  }

  /**
   * Processes a 'webform_civicrm_postcode_lookup' element.
   */
  public static function processWebformCivicrmPostcodeLookup(&$element, FormStateInterface $form_state, &$complete_form) {
    // Here you can add and manipulate your element's properties and callbacks.
    global $base_url;

    \Drupal::service('civicrm')->initialize();
    $settingsStr = \CRM_Core_BAO_Setting::getItem('CiviCRM Postcode Lookup', 'api_details');
    $settingsArray = unserialize($settingsStr);

    $element['#attached']['library'][] = 'webform_civicrm_postcode_lookup/postcode_lookup';
    $element['#attached']['drupalSettings']['civicrmPostcode'][$element['#id']] = [
      'baseUrl' => $base_url,
      'fieldId' => $element['#id'],
      'lookupProvider' => $settingsArray['provider'],
    ];
    return $element;
  }

  /**
   * Webform element validation handler for #type 'webform_civicrm_postcode_lookup'.
   */
  public static function validateWebformCivicrmPostcodeLookup(&$element, FormStateInterface $form_state, &$complete_form) {
    // Here you can add custom validation logic.
  }

  /**
   * Prepares a #type 'email_multiple' render element for theme_element().
   *
   * @param array $element
   *   An associative array containing the properties of the element.
   *   Properties used: #title, #value, #description, #size, #maxlength,
   *   #placeholder, #required, #attributes.
   *
   * @return array
   *   The $element with prepared variables ready for theme_element().
   */
  public static function preRenderWebformCivicrmPostcodeLookup(array $element) {
    $element['#attributes']['type'] = 'text';
    Element::setAttributes($element, ['id', 'name', 'value', 'size', 'maxlength', 'placeholder']);
    static::setAttributes($element, ['form-text', 'webform-civicrm-postcode-lookup']);
    return $element;
  }

}
