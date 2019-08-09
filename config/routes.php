<?php

$routes = [
    '' => [
        'controller' => 'IndexController',
        'method' => 'exposeApi'
    ],

    '/student/:id' => array (
        'controller' => 'StudentController',
        'method' => 'getById'
    )
];

define('ROUTES', $routes);