<?php

namespace src\controllers;

class HomeController
{
    public function index()
    {
        $data = [
            'message' => 'Olá, mundo!',
            'timestamp' => time(),
        ];

        return $data;
    }
}
