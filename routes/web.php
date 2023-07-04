<?php

$routes = [
    'GET' => [
        '/' => fn () => load('HomeController', 'index'),

        '/search/book/:title' => fn ($title) => load('BookController', 'searchBooks', [$title]),
        '/book/category/:category' => fn ($category) => load('BookController', 'searchByCategory', [$category]),
        '/book/recommendations' => fn () => load('BookController', 'bookRecommendations'),
    ],
    'POST' => [],
];
