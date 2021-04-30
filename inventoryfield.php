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
    if ($form->elementExists('html_type')) {
      // Add inventoryfield js
      CRM_Core_Resources::singleton()->addScriptFile('com.joineryhq.inventoryfield', 'js/CRM_Custom_Form_Field.js', 100, 'page-footer');

      // Create fields that we need to inject
      $limitPer = [
        'Do not limit',
        'Event',
      ];

      $form->addElement(
        'select',
        'limit_per',
        E::ts('Limit usage of each option per'),
        ['' => E::ts('- Select -')] + $limitPer,
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
        $inventoryfields = \Civi\Api4\Inventoryfield::get()
          ->addWhere('custom_field_id', '=', $form->_defaultValues['id'])
          ->execute()
          ->first();

        $defaults = array();

        if ($inventoryfields) {
          $defaults['limit_per'] = $inventoryfields['limit_per'];
        }

        $form->setDefaults($defaults);
      }
    }
  }
}

/**
 * Implements hook_civicrm_postProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postProcess
 */
function inventoryfield_civicrm_postProcess($formName, &$form) {
  if ($formName == 'CRM_Custom_Form_Field' && $form->_submitValues['html_type'] === 'Select') {
    $inventoryfields = \Civi\Api4\Inventoryfield::get()
      ->addWhere('custom_field_id', '=', $form->getVar('_id'))
      ->execute()
      ->first();

    $limitPer = !empty($form->_submitValues['limit_per']) ? 1 : 0;

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

    // $text = json_encode($values);

    // // Save to the database autoincfield custom table
    // $sql = "INSERT INTO `civicrm_meowk` (`text`) VALUES ('$text')";
    // CRM_Core_DAO::executeQuery($sql);
  }
}
