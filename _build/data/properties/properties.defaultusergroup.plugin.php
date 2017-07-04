<?php
/**
 * Properties file for DefaultUserGroup plugin
 *
 * Copyright 2012-2017 by Bob Ray <https://bobsguides.com>
 * Created on 07-27-2014
 *
 * @package defaultusergroup
 * @subpackage build
 */




$properties = array (
  'dug_groups' => 
  array (
    'name' => 'dug_groups',
    'desc' => 'Comma-separated list of User Groups to assign new users to',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '',
  ),
  'dug_roles' => 
  array (
    'name' => 'dug_roles',
    'desc' => '(optional) Comma-separated list of Roles to assign users to. If empty, each user will have the Member role. If one value is specified, users will get that role in each group. If multiple roles are listed, they will be matched to the groups listed. If you specify multiple roles, make sure the number of roles is equal to the number of  groups!',
    'type' => 'textfield',
    'options' => 
    array (
    ),
    'value' => '',
    'lexicon' => NULL,
    'area' => '',
  ),
);

return $properties;

