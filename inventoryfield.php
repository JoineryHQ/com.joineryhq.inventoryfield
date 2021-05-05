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
  if ($formName == 'CRM_Custom_Form_Field') {
    $customGroup = \Civi\Api4\CustomGroup::get()
      ->addSelect('extends')
      ->addWhere('id', '=', $form->getVar('_gid'))
      ->execute()
      ->first();

    if ($form->elementExists('html_type') && $customGroup['extends'] == 'Participant') {
      // Add inventoryfield js
      CRM_Core_Resources::singleton()->addScriptFile('com.joineryhq.inventoryfield', 'js/CRM_Custom_Form_Field.js', 100, 'page-footer');

      // Create select field that we need to inject
      // Value of the field
      $limitPer = [
        'Do not limit',
        'Event',
      ];
      $form->add(
        'select',
        'limit_per',
        E::ts('Limit usage of each option per'),
        $limitPer,
        TRUE,
        ['class' => 'crm-select2']
      );

      // Assign bhfe injected fields to the template.
      $tpl = CRM_Core_Smarty::singleton();
      $bhfe = $tpl->get_template_vars('beginHookFormElements');
      if (!$bhfe) {
        $bhfe = array();
      }
      $bhfe[] = 'limit_per';
      $form->assign('beginHookFormElements', $bhfe);

      // Set default values if update page
      if (!empty($form->_defaultValues['id'])) {
        // Call inventoryfield api
        $inventoryfields = \Civi\Api4\Inventoryfield::get()
          ->addWhere('custom_field_id', '=', $form->_defaultValues['id'])
          ->execute()
          ->first();

        $defaults = array();
        // Set defauts for fields
        if ($inventoryfields) {
          $defaults['limit_per'] = $inventoryfields['limit_per'];
        }
        $form->setDefaults($defaults);
      }
    }
  }
  else if ($formName == 'CRM_Event_Form_Registration_Register') {
    // Call inventoryfield api
    $inventoryfields = \Civi\Api4\Inventoryfield::get()
      ->execute();

    foreach ($inventoryfields as $inventoryfield) {
      $customFieldId = $inventoryfield['custom_field_id'];
      $customField = "custom_{$customFieldId}";
      // Check if custom field is registered in inventoryfield and limit_per is true
      if ($form->elementExists($customField) && $inventoryfield['limit_per']) {
        // Get participant details using custom field id
        $participantDetails = _inventoryfield_getParticipantDetails($customFieldId);
        // Get custom field details
        $elField = $form->getElement($customField);
        $elFieldOptions = & $elField->_options;

        // Foreach custom field option values
        foreach ($elFieldOptions as $key => $elFieldOption) {
          // If value exist in $participantDetails array, edit to disable
          if (!empty($participantDetails[$elFieldOption['text']])) {
            $elFieldOptions[$key]['text'] = $elFieldOption['text'] . ' (unavailable)';
            $elFieldOptions[$key]['attr']['disabled'] = TRUE;
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
      ->execute();

    foreach ($inventoryfields as $inventoryfield) {
      // Re check inventoryfield limit_per
      if ($inventoryfield['limit_per']) {
        $customFieldId = $inventoryfield['custom_field_id'];
        // Get participant details using custom field id
        $participantDetails = _inventoryfield_getParticipantDetails($customFieldId);
        $customField = "custom_{$customFieldId}";
        $customFieldValue = $fields[$customField];

        // If value exist in $participantDetails array, return and error
        if (!empty($participantDetails[$customFieldValue])) {
          // Get custom field details for the label in error
          $elField = $form->getElement($customField);
          // Get contact display name for the error
          $displayName = CRM_Contact_BAO_Contact::displayName($participantDetails[$customFieldValue]['contact_id']);
          // Get url param
          $urlParam = "action=view&reset=1&id={$participantDetails[$customFieldValue]['participant_id']}&cid={$participantDetails[$customFieldValue]['contact_id']}&context=home";
          // Get participan link with the urlParam
          $participantLink = CRM_Utils_System::url('civicrm/contact/view/participant', $urlParam);
          // Add error
          $errors[$customField] = E::ts("{$elField->_label}: Your selection was just taken by someone else.");
          return;
        }
      }
    }
  }

  return;
}

/**
 * Get participant details using customfield id
 *
 * @param $customFieldId int
 *
 * @return array of custom participan details
 */
function _inventoryfield_getParticipantDetails($customFieldId) {
  // Call Participant api using custom_X (X as $customFieldId)
  $participants = civicrm_api3('Participant', 'get', [
    'sequential' => 1,
    'return' => ["custom_{$customFieldId}", "participant_status_id"],
    "custom_{$customFieldId}" => ['IS NOT NULL' => 1],
  ]);

  // Initialize details variable as array
  $details = [];
  // If there is a $participants, foreach for the details
  if ($participants) {
    foreach ($participants['values'] as $participantDetails) {
      // Check participant status using participant_status_id and make sure is_counted as 1
      $participantStatusType = civicrm_api3('ParticipantStatusType', 'get', [
        'sequential' => 1,
        'id' => $participantDetails['participant_status_id'],
        'is_counted' => 1,
      ]);

      // If participantStatusType has a data, it is a counted status and..
      // get all necessary data from the $participantDetails
      if ($participantStatusType['count']) {
        // Add custom_field for the js code
        $details['custom_field'] = "custom_{$customFieldId}";
        $details[$participantDetails["custom_{$customFieldId}"]]['participant_id'] = $participantDetails['participant_id'];
        $details[$participantDetails["custom_{$customFieldId}"]]['contact_id'] = $participantDetails['contact_id'];
      }
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
  $customGroup = \Civi\Api4\CustomGroup::get()
    ->addSelect('extends')
    ->addWhere('id', '=', $form->getVar('_gid'))
    ->execute()
    ->first();

  if ($formName == 'CRM_Custom_Form_Field'
    && $form->_submitValues['html_type'] === 'Select'
    && $customGroup['extends'] == 'Participant'
  ) {
    // Call Inventoryfield api to make sure it is an edit or creating a new data
    $inventoryfields = \Civi\Api4\Inventoryfield::get()
      ->addWhere('custom_field_id', '=', $form->getVar('_id'))
      ->execute()
      ->first();

    // Set limit_per fields as 0 if it is empty
    $limitPer = !empty($form->_submitValues['limit_per']) ? 1 : 0;

    // If Inventoryfield api has data, update that data..
    // if not, create a new data
    if ($inventoryfields) {
      $results = \Civi\Api4\Inventoryfield::update()
        ->addWhere('custom_field_id', '=', $inventoryfields['custom_field_id'])
        ->addValue('limit_per', $limitPer)
        ->execute();
    }
    else {
      $results = \Civi\Api4\Inventoryfield::create()
        ->addValue('custom_field_id', $form->getVar('_id'))
        ->addValue('limit_per', $limitPer)
        ->execute();
    }
  }
}
