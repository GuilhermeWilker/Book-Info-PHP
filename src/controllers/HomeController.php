<?php

namespace src\controllers;

class HomeController
{
    public function index()
    {
        $data = [
            'message' => 'Olá, mundo! Você esta usando a API',
            'timestamp' => time(),
        ];

        return $data;
    }

    public function show($name)
    {
        $data = [
            'message' => "Nome do usuário é {$name}",
            'timestamp' => time(),
        ];

        return $data;
    }
}
