<?php

// https://openlibrary.org/developers/api

require '../vendor/autoload.php';
require '../routes/web.php';
require '../routes/load.php';

header('Content-Type: application/json');

try {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $URI = parse_url($_SERVER['REQUEST_URI'])['path'];

    if (!isset($routes[$requestMethod])) {
        echo json_encode(['error' => 'A rota não existe.']);
        exit;
    }

    $matchedRoute = null;
    $matchedParams = [];

    foreach ($routes[$requestMethod] as $routePattern => $controller) {
        $pattern = str_replace('/', '\/', $routePattern);
        $pattern = preg_replace('/:(\w+)/', '([^\/]+)', $pattern);
        $pattern = "/^{$pattern}$/";

        if (preg_match($pattern, $URI, $matches)) {
            $matchedRoute = $controller;
            $matchedParams = array_slice($matches, 1);
            break;
        }
    }

    if ($matchedRoute === null) {
        echo json_encode(['error' => 'A rota não existe.']);
        exit;
    }

    echo is_callable($matchedRoute)
        ? $matchedRoute(...$matchedParams)
        : json_encode(['error' => 'Erro ao processar a rota.']);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
