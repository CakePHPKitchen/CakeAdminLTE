<?php

use Cake\Core\Configure;

require_once __DIR__ . '/menus.php';

$permissions = Configure::read('MyPermissions');
$someMorePermissions = [
    [
        'role' => ['user'],
        'plugin' => 'AdminLTETimeline',
        'controller' => ['Timeline'],
        'action' => ['view'],
        'allowed' => true,
    ]
];
$permissions = array_merge((array)$permissions, $someMorePermissions);
Configure::write('MyPermissions', $permissions);
