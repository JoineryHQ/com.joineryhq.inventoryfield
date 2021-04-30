<?php
use CRM_Inventoryfield_ExtensionUtil as E;

class CRM_Inventoryfield_BAO_Inventoryfield extends CRM_Inventoryfield_DAO_Inventoryfield {

  /**
   * Create a new Inventoryfield based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Inventoryfield_DAO_Inventoryfield|NULL
   *
  public static function create($params) {
    $className = 'CRM_Inventoryfield_DAO_Inventoryfield';
    $entityName = 'Inventoryfield';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */

}
