# D9 CiviCRM Postcode Lookup for webforms

## Overview
Integrates civicrm postcode lookup extension [ukpostcodes](https://lab.civicrm.org/extensions/ukpostcodes) with [webform_civicrm](https://www.drupal.org/project/webform_civicrm) for Drupal 9 / 10.

## Requirement
Requires jQuery UI Autocomplete module. For installation see https://www.drupal.org/project/jquery_ui_autocomplete.

## Steps
This extension provides a element type called "CiviCRM Postcode Lookup". To use this you will need to follow the steps below:

1. Add address fields for contacts using webform_civicrm.
2. Go to "webform" tab and change widget type of postal code field from textfield to "CiviCRM Postcode Lookup" and save it.
3. Go to webform and enter a valid UK postcode. For example: E1 6LA
4. Choose any address from lookup list and it will automatically fill chosen address in respective fields.

## CiviCRM Dependencies
As this module uses resources provided by [ukpostcodes](https://lab.civicrm.org/extensions/ukpostcodes) with [webform_civicrm](https://www.drupal.org/project/webform_civicrm), this needs to be enabled under CiviCRM.

## Drupal Dependencies
This module depends on webform_civicrm. Please download and enable it from here: https://www.drupal.org/project/webform_civicrm
