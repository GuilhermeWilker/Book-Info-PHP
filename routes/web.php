<?php

function load(string $controller, string $controllerAction)
{
    try {
        $controllerNamespace = "src\\controllers\\{$controller}";

        if (!class_exists($controllerNamespace)) {
            throw new Exception("O controller {$controller} não existe!");
        }

        $controllerInstance = new $controllerNamespace();

        if (!method_exists($controllerInstance, $controllerAction)) {
            throw new Exception("O método {$controllerAction} não existe no controller {$controller}");
        }

        $result = $controllerInstance->$controllerAction();

        return json_encode($result);
    } catch (Exception $e) {
        return json_encode(['error' => $e->getMessage()]);
    }
}

$routes = [
    'GET' => [
        '/' => fn () => load('HomeController', 'index'),
        ],
    'POST' => [],
    ];
