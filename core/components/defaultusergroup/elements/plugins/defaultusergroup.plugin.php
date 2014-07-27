<?php
/**
 * DefaultUserGroup plugin
 *
 * Copyright 2011 Bob Ray
 *
 * @author Bob Ray
 * 1/20/12
 * 
 * DefaultUserGroup is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the Free
 * Software Foundation; either version 2 of the License, or (at your option) any
 * later version.
 *
 * DefaultUserGroup is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * DefaultUserGroup; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package defaultusergroup
 */
/**
 * MODx DefaultUserGroup Plugin
 *
 * Description: Adds new users to default user group(s) with optional role
  *
 * @package defaultusergroup
 *
 * @property dug_groups (string) a comma-separated list of groups to assign
 *      the user to.
 *
 * @property dug_roles (string) a comma-separated list of roles to assign
 */

/*
 *
 * If dug_role is empty, all users will get the role of Member.
 *
 * If dug_role specifies one role, users will get that role in all groups.
 *
 * If dug_role specifies more than one role, the roles will be matched to
 * the list of user groups.
 *
 * Important: If you specify multiple roles, make sure the number of roles
 * is equal to the number of groups! */


/* only operate on new users */

/** @var $modx modX */
/** @var $scriptProperties array */
if ($mode != modSystemEvent::MODE_NEW) return;

$groupSetting = $modx->getOption('dug_groups', $scriptProperties, null);
$roles = explode(',',$modx->getOption('dug_roles', $scriptProperties, null) );

if (!empty($groupSetting)) {
   $groups = explode(',',$groupSetting);
   $i = 0; 
   foreach ($groups as $group) {
      $groupRole = empty($roles[$i])? null : $roles[$i];
      if (count($roles) > 1) {
        $i++;
      }
      $success = $user->joinGroup($group, $groupRole );
   }
}

return '';