<?php
use CRM_Inventoryfield_ExtensionUtil as E;

return [
  'name' => 'Inventoryfield',
  'table' => 'civicrm_inventoryfield',
  'class' => 'CRM_Inventoryfield_DAO_Inventoryfield',
  'getInfo' => fn() => [
    'title' => E::ts('Inventoryfield'),
    'title_plural' => E::ts('Inventoryfields'),
    'description' => E::ts('FIXME'),
    'log' => TRUE,
  ],
  'getFields' => fn() => [
    'id' => [
      'title' => E::ts('ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'required' => TRUE,
      'description' => E::ts('Unique Inventoryfield ID'),
      'primary_key' => TRUE,
      'auto_increment' => TRUE,
    ],
    'custom_field_id' => [
      'title' => E::ts('Custom Field ID'),
      'sql_type' => 'int unsigned',
      'input_type' => 'EntityRef',
      'description' => E::ts('FK to civicrm_custom_field.id'),
      'entity_reference' => [
        'entity' => 'CustomField',
        'key' => 'id',
        'on_delete' => 'CASCADE',
      ],
    ],
    'limit_per' => [
      'title' => E::ts('Limit Per'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'default' => 0,
    ],
    'limit_per_amount' => [
      'title' => E::ts('Limit Per Amount'),
      'sql_type' => 'int unsigned',
      'input_type' => 'Number',
      'default' => 1,
    ],
  ],
];
