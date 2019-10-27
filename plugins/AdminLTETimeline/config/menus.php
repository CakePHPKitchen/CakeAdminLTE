<?php

use AdminLTE\Utility\Sidebar;

$menus = [
    'user' => [
        [
            'type'  => 'link',
            'link'  => 'Timeline',
            'icon'  => 'fa-newspaper-o',
            'path'  => '/timeline'
        ]
    ]
];

Sidebar::setMenu($menus);
