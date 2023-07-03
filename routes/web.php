<?php

$routes = [
    'GET' => [
        '/' => fn () => load('HomeController', 'index'),

        '/search/book/:title' => fn ($title) => load('BookController', 'searchBooks', [$title]),
    ],
    'POST' => [],
];
