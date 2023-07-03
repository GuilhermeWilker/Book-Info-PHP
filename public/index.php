<?php

require '../vendor/autoload.php';
require '../routes/web.php';

header('Content-Type: application/json');

try {
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $URI = parse_url($_SERVER['REQUEST_URI'])['path'];

    if (!isset($routes[$requestMethod])) {
        echo json_encode(['error' => 'A rota não existe.']);
        exit;
    }

    if (!array_key_exists($URI, $routes[$requestMethod])) {
        echo json_encode(['error' => 'A rota não existe.']);
        exit;
    }

    $controller = $routes[$requestMethod][$URI];

    echo is_callable($controller)
    ? $controller()
    : json_encode(['error' => 'Erro ao processar a rota.']);
} catch (Exception $e) {
    echo $e->getMessage();
}
