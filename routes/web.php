<?php

$routes = [
    'GET' => [
        '/' => fn () => load('HomeController', 'index'),
        '/user/:name' => fn ($name) => load('HomeController', 'show', [$name]),
    ],
    'POST' => [],
];
