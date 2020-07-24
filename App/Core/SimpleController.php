<?php

namespace App\Core;

class SimpleController
{
    public function __construct()
    {
    }

    public function error404()
    {
        return 'Такой страницы не существует';
    }

    public function index()
    {
        return $this->error404();
    }
}