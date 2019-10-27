<?php

namespace AdminLTETimeline\Utility;

use AdminLTE\Utility\Auth;
use AdminLTE\Utility\MenuNotifications;
use Cake\ORM\TableRegistry;

class Timeline {

    const Globe = 'Global';
    const Role = 'Role';
    const User = 'User';

    const Role_User = 'user';
    const Role_Member = 'member';
    const Role_Admin = 'admin';
    const Role_Super = 'superadmin';

    public static function getTimelineTable()
    {
        return TableRegistry::getTableLocator()->get('AdminLTETimeline.Timeline');
    }

    public static function addGlobalTimelineEvent($icon, $color, $header, $body, $footer)
    {
        self::addTimelineEvent(self::Globe, '', '', $icon, $color, $header, $body, $footer);
    }

    public static function addRoleTimelineEvent($role, $icon, $color, $header, $body, $footer)
    {
        self::addTimelineEvent(self::Role, '', $role, $icon, $color, $header, $body, $footer);
    }

    public static function addUserTimelineEvent($user_id, $icon, $color, $header, $body, $footer)
    {
        self::addTimelineEvent(self::User, $user_id, '', $icon, $color, $header, $body, $footer);
    }

    public static function addTimelineEvent($destination, $user_id, $role_id, $icon, $color, $header, $body, $footer)
    {
        $timelineTable = self::getTimelineTable();
        $timelineEntity = $timelineTable->newEntity([
            'destination' => $destination,
            'user_id' => $user_id,
            'role_id' => $role_id,
            'icon' => $icon,
            'color' => $color,
            'header' => $header,
            'body' => $body,
            'footer' => $footer,
            'created' => new \DateTime('now')
        ]);
        $timelineTable->save($timelineEntity);

        MenuNotifications::addItemMenuNotification('Timeline', 'Timeline', $destination, $user_id, $role_id);
    }
}
