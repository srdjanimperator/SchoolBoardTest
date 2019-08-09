<?php

$routes = [
    '' => [
        'controller' => 'IndexController',
        'method' => 'exposeApi',
        'http_method' => 'GET'
    ],

    '/student/:id' => array (
        'controller' => 'StudentController',
        'method' => 'getById',
        'http_method' => 'GET'
    ),

];

define('ROUTES', $routes);