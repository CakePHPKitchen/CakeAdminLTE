<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::plugin(
    'AdminLTETimeline',
    ['path' => '/admin-l-t-e-timeline'],
    function (RouteBuilder $routes) {
        $routes->fallbacks(DashedRoute::class);
    }
);

Router::connect('/timeline', ['plugin' => 'AdminLTETimeline', 'controller' => 'Timeline', 'action' => 'view']);
