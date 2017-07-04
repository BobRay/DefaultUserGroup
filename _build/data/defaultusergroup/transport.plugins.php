<?php
/**
 * plugins transport file for DefaultUserGroup extra
 *
 * Copyright 2012-2017 by Bob Ray <https://bobsguides.com>
 * Created on 07-27-2014
 *
 * @package defaultusergroup
 * @subpackage build
 */

if (! function_exists('stripPhpTags')) {
    function stripPhpTags($filename) {
        $o = file_get_contents($filename);
        $o = str_replace('<' . '?' . 'php', '', $o);
        $o = str_replace('?>', '', $o);
        $o = trim($o);
        return $o;
    }
}
/* @var $modx modX */
/* @var $sources array */
/* @var xPDOObject[] $plugins */


$plugins = array();

$plugins[1] = $modx->newObject('modPlugin');
$plugins[1]->fromArray(array (
  'id' => 1,
  'property_preprocess' => false,
  'name' => 'DefaultUserGroup',
  'description' => '',
  'disabled' => true,
), '', true, true);
$plugins[1]->setContent(file_get_contents($sources['source_core'] . '/elements/plugins/defaultusergroup.plugin.php'));


$properties = include $sources['data'].'properties/properties.defaultusergroup.plugin.php';
$plugins[1]->setProperties($properties);
unset($properties);

return $plugins;
