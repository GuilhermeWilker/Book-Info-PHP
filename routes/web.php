<?php

function load(string $controller, string $controllerAction)
{
    $controllerNamespace = "src\\controllers\\{$controller}";

    if (!class_exists($controllerNamespace)) {
        throw new Exception("O controller {$controller} não existe!");
    }

    $controllerInstance = new $controllerNamespace();

    if (!method_exists($controllerInstance, $controllerAction)) {
        throw new Exception("O método {$controllerAction} não existe no controller {$controller}");
    }

    $controllerInstance->$controllerAction();
}

$routes = [
    'GET' => [
        '/' => load('HomeController', 'index'),
        ],
    'POST' => [],
    ];
