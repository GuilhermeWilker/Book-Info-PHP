<?php

namespace src\controllers;

class HomeController
{
    public function index()
    {
        $timestamp = time();
        $formattedDate = date('d/m/Y', $timestamp);
        $formattedDate = str_replace('/', '-', $formattedDate);

        $data = [
            'message' => 'Olá! Você está usando a Book Plus API -- Leia a documentação para mais informações',
            'timestamp' => $formattedDate,
        ];

        return $data;
    }
}
