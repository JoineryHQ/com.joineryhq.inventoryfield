<?php

require_once 'inventoryfield.civix.php';
// phpcs:disable
use CRM_Inventoryfield_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function inventoryfield_civicrm_config(&$config) {
  _inventoryfield_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function inventoryfield_civicrm_xmlMenu(&$files) {
  _inventoryfield_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function inventoryfield_civicrm_install() {
  _inventoryfield_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function inventoryfield_civicrm_postInstall() {
  _inventoryfield_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function inventoryfield_civicrm_uninstall() {
  _inventoryfield_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function inventoryfield_civicrm_enable() {
  _inventoryfield_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function inventoryfield_civicrm_disable() {
  _inventoryfield_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function inventoryfield_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _inventoryfield_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function inventoryfield_civicrm_managed(&$entities) {
  _inventoryfield_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function inventoryfield_civicrm_caseTypes(&$caseTypes) {
  _inventoryfield_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function inventoryfield_civicrm_angularModules(&$angularModules) {
  _inventoryfield_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function inventoryfield_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _inventoryfield_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function inventoryfield_civicrm_entityTypes(&$entityTypes) {
  _inventoryfield_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_thems().
 */
function inventoryfield_civicrm_themes(&$themes) {
  _inventoryfield_civix_civicrm_themes($themes);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function inventoryfield_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function inventoryfield_civicrm_navigationMenu(&$menu) {
//  _inventoryfield_civix_insert_navigation_menu($menu, 'Mailings', array(
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ));
//  _inventoryfield_civix_navigationMenu($menu);
//}

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_buildForm
 */
function inventoryfield_civicrm_buildForm($formName, &$form) {
  // For custom field and price fieldedit form
  if (
    ($formName == 'CRM_Custom_Form_Field' || $formName == 'CRM_Price_Form_Field')
    && $form->elementExists('html_type')
  ) {
    $inventoryfieldColumn = '';
    $inventoryfieldColumnValue = NULL;
    if ($form->getVar('_gid')) {
      $customGroup = \Civi\Api4\CustomGroup::get()
        ->setCheckPermissions(FALSE)
        ->addWhere('extends', '=', 'Participant')
        ->addWhere('id', '=', $form->getVar('_gid'))
        ->execute()
        ->first();
      if (!$customGroup) {
        return;
      }

      $inventoryfieldColumn = 'custom_field_id';
    }
    else if ($form->getVar('_sid')) {
      $priceSets = \Civi\Api4\PriceSet::get()
        ->setCheckPermissions(FALSE)
        ->addWhere('extends:name', '=', 'CiviEvent')
        ->addWhere('id', '=', $form->getVar('_sid'))
        ->execute()
        ->first();

      if (!$priceSets) {
        return;
      }

      $inventoryfieldColumn = 'price_field_id';
    }

    // Add inventoryfield js
    CRM_Core_Resources::singleton()->addScriptFile('com.joineryhq.inventoryfield', 'js/CRM_Custom-Price_Form_Field.js', 100, 'page-footer');

    // Create select field that we need to inject
    // Value of the field
    $limitPerOptions = [
      0 => E::ts('Do not limit'),
      1 => E::ts('Event'),
    ];
    $form->add(
      'select',
      'limit_per',
      E::ts('Limit usage of each option per'),
      $limitPerOptions,
      TRUE,
      ['class' => 'crm-select2']
    );

    $form->add('text', 'limit_per_amount', ts('Limit usage amount'));

    // Assign bhfe injected fields to the template.
    $tpl = CRM_Core_Smarty::singleton();
    $bhfe = $tpl->get_template_vars('beginHookFormElements');
    if (!$bhfe) {
      $bhfe = array();
    }
    $bhfe[] = 'limit_per';
    $bhfe[] = 'limit_per_amount';
    $form->assign('beginHookFormElements', $bhfe);

    // Set default values if update page
    if (!empty($form->_defaultValues['id'])) {
      // Call inventoryfield api
      $inventoryfield = \Civi\Api4\Inventoryfield::get()
        ->setCheckPermissions(FALSE)
        ->addWhere($inventoryfieldColumn, '=', $form->_defaultValues['id'])
        ->execute()
        ->first();

      $defaults = array();
      // Set defauts for fields
      if ($inventoryfield) {
        $defaults['limit_per'] = $inventoryfield['limit_per'];
        $defaults['limit_per_amount'] = $inventoryfield['limit_per_amount'];
      }
      $form->setDefaults($defaults);
    }
  }
  // For online registration form
  else if ($formName == 'CRM_Event_Form_Registration_Register') {
    // Call inventoryfield api
    $inventoryfields = \Civi\Api4\Inventoryfield::get()
      ->setCheckPermissions(FALSE)
      ->execute();

    foreach ($inventoryfields as $inventoryfield) {
      $fieldType = $inventoryfield['custom_field_id'] ? 'custom' : 'price';
      $fieldId = $inventoryfield['custom_field_id'] ?? $inventoryfield['price_field_id'];
      $fieldName = "{$fieldType}_{$fieldId}";

      // Check if custom field is registered in inventoryfield and limit_per is true
      if ($inventoryfield['limit_per'] && $form->elementExists($fieldName)) {
        $eventId = ($form->getVar('_id') ?? $form->getVar('_eventId'));
        // Get participant details using custom field id
        $fieldUsedOptionsPerEvent = _inventoryfield_getFieldUsedOptionsPerEvent($fieldType, $fieldId, $eventId, $inventoryfield['limit_per_amount']);
        // Get custom field details
        $elField = $form->getElement($fieldName);
        $elFieldOptions = & $elField->_options;

        // Foreach custom field option values
        foreach ($elFieldOptions as $elFieldOptionKey => $elFieldOption) {
          // If value exist in $fieldUsedOptionsPerEvent array, edit to disable
          if (!empty($fieldUsedOptionsPerEvent[$elFieldOption['attr']['value']])) {
            $elFieldOptions[$elFieldOptionKey]['text'] = $elFieldOption['text'] . E::ts(' (unavailable)');
            $elFieldOptions[$elFieldOptionKey]['attr']['disabled'] = TRUE;
          }
        }
      }
    }
  }
}

/**
 * Implements hook_civicrm_validateForm().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_validateForm/
 */
function inventoryfield_civicrm_validateForm($formName, &$fields, &$files, &$form, &$errors) {
  if ($formName == 'CRM_Event_Form_Registration_Register') {
    // Call inventoryfield api for validation
    $inventoryfields = \Civi\Api4\Inventoryfield::get()
      ->setCheckPermissions(FALSE)
      ->execute();

    foreach ($inventoryfields as $inventoryfield) {
      // Re check inventoryfield limit_per
      if ($inventoryfield['limit_per']) {
        $fieldType = $inventoryfield['custom_field_id'] ? 'custom' : 'price';
        $fieldId = $inventoryfield['custom_field_id'] ?? $inventoryfield['price_field_id'];
        // Get participant details using custom field id
        $fieldUsedOptionsPerEvent = _inventoryfield_getFieldUsedOptionsPerEvent($fieldType, $fieldId, $form->getVar('_id'), $inventoryfield['limit_per_amount']);
        $fieldName = "{$fieldType}_{$fieldId}";
        $fieldValue = $fields[$fieldName];

        // If value exist in $fieldUsedOptionsPerEvent array, return and error
        if (!empty($fieldUsedOptionsPerEvent[$fieldValue])) {
          // Get custom field details for the label in error
          $elField = $form->getElement($fieldName);
          // Add error
          $errors[$fieldName] = E::ts("{$elField->_label}: Your selection was just taken by someone else.");
          return;
        }
      }
    }
  }
  else if ($formName == 'CRM_Custom_Form_Field') {
    $fieldLimitPerAmount = $fields['limit_per_amount'];

    if (!empty($fieldLimitPerAmount)) {
      if (!is_numeric($fieldLimitPerAmount)) {
        $errors['limit_per_amount'] = E::ts('Limit usage amount field should only have numeric value.');
        return;
      }

      if (floor($fieldLimitPerAmount) != $fieldLimitPerAmount) {
        $errors['limit_per_amount'] = E::ts('Limit usage amount field should not be a decimal.');
        return;
      }

      if ($fieldLimitPerAmount < 1) {
        $errors['limit_per_amount'] = E::ts('Limit usage amount field should not be below 1.');
        return;
      }
    }
  }

  return;
}

/**
 * Get participant details using fieldType and field id of either price field or custom field, and event id
 *
 * @param $fieldType string
 * @param $fieldId int
 * @param $eventId int
 * @param $limitPerAmount int
 *
 * @return array of custom participant details
 */
function _inventoryfield_getFieldUsedOptionsPerEvent($fieldType, $fieldId, $eventId, $limitPerAmount) {
  // Initialize details variable as array
  $details = [];
  $values = [];

  if ($fieldType == 'custom') {
    // Call Participant api using custom_X (X as $fieldId) and event_id
    // with participantStatusType.get api
    $participants = civicrm_api3('Participant', 'get', [
      'sequential' => 1,
      'return' => ["custom_{$fieldId}", 'participant_status_id'],
      "custom_{$fieldId}" => ['IS NOT NULL' => 1],
      'event_id' => $eventId,
      'api.ParticipantStatusType.get' => [
        'id' => '$value.participant_status_id',
        'is_counted' => 1,
      ],
      'options' => [
        'limit' => 0,
      ],
    ]);

    // If there is a $participants, foreach for the details
    if ($participants) {
      foreach ($participants['values'] as $participantDetails) {
        // If participantStatusType has a data, it is a counted status and store it on getCustomValues
        if ($participantDetails['api.ParticipantStatusType.get']['count']) {
          $values[] = $participantDetails["custom_{$fieldId}"];
        }
      }
    }
  }
  else if ($fieldType == 'price') {
    // Call LineItem api using price_field_id as $fieldId
    // with Participant.get api called using $value.entity_id and event_id
    // lastly with participantStatusType.get api
    $priceFieldParticipant = civicrm_api3('LineItem', 'get', [
      'sequential' => 1,
      'return' => ['price_field_value_id', 'entity_id'],
      'price_field_id' => $fieldId,
      'api.Participant.get' => [
        'return' => ['participant_status_id'],
        'id' => '$value.entity_id',
        'event_id' => $eventId,
        'api.ParticipantStatusType.get' => [
          'id' => '$value.participant_status_id',
          'is_counted' => 1,
        ],
      ],
    ]);

    // If there is a $priceFieldParticipant, foreach for the details
    if ($priceFieldParticipant) {
      foreach ($priceFieldParticipant['values'] as $participantDetails) {
        // If participantStatusType has a data, it is a counted status
        if ($participantDetails['api.Participant.get']['values'][0]['api.ParticipantStatusType.get']['count']) {
          $values[] = $participantDetails['price_field_value_id'];
        }
      }
    }
  }

  // Count all values of values
  $countValues = array_count_values($values);
  foreach ($countValues as $value => $valueCount) {
    // If countValues greater thatn or equals to limitPerAmount..
    // it needs to be removed
    if ($valueCount >= $limitPerAmount) {
      $details[$value] = $value;
    }
  }

  return $details;
}

/**
 * Implements hook_civicrm_postProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postProcess
 */
function inventoryfield_civicrm_postProcess($formName, &$form) {
  if (
    ($formName == 'CRM_Custom_Form_Field' || $formName == 'CRM_Price_Form_Field')
    && $form->_submitValues['html_type'] === 'Select'
  ) {
    $inventoryfieldColumn = '';
    // If _gid, set inventoryfieldColumn as custom_field_id
    if ($form->getVar('_gid')) {
      $customGroup = \Civi\Api4\CustomGroup::get()
        ->setCheckPermissions(FALSE)
        ->addWhere('extends', '=', 'Participant')
        ->addWhere('id', '=', $form->getVar('_gid'))
        ->execute()
        ->first();

      if (!$customGroup) {
        return;
      }

      $inventoryfieldColumn = 'custom_field_id';
    }
    // If _sid, set inventoryfieldColumn as price_field_id
    else if ($form->getVar('_sid')) {
      $priceSets = \Civi\Api4\PriceSet::get()
        ->setCheckPermissions(FALSE)
        ->addWhere('extends:name', '=', 'CiviEvent')
        ->addWhere('id', '=', $form->getVar('_sid'))
        ->execute()
        ->first();

      if (!$priceSets) {
        return;
      }

      $inventoryfieldColumn = 'price_field_id';
    }

    // Call Inventoryfield api to make sure it is an edit or creating a new data
    $inventoryfield = \Civi\Api4\Inventoryfield::get()
      ->setCheckPermissions(FALSE)
      ->addWhere($inventoryfieldColumn, '=', $form->getVar('_id'))
      ->execute()
      ->first();

    // Set limit_per fields as 0 if it is empty
    $limitPer = !empty($form->_submitValues['limit_per']) ? 1 : 0;
    $limitPerAmount = empty($form->_submitValues['limit_per_amount']) ? 1 : $form->_submitValues['limit_per_amount'];

    // If Inventoryfield api has data, update that data..
    // if not, create a new data
    if ($inventoryfield) {
      $results = \Civi\Api4\Inventoryfield::update()
        ->setCheckPermissions(FALSE)
        ->addWhere($inventoryfieldColumn, '=', $form->getVar('_id'))
        ->addValue('limit_per', $limitPer)
        ->addValue('limit_per_amount', $limitPerAmount)
        ->execute();
    }
    else {
      $results = \Civi\Api4\Inventoryfield::create()
        ->setCheckPermissions(FALSE)
        ->addValue($inventoryfieldColumn, $form->getVar('_id'))
        ->addValue('limit_per', $limitPer)
        ->addValue('limit_per_amount', $limitPerAmount)
        ->execute();
    }
  }
}
