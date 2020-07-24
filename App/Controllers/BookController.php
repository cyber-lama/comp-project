<?php

namespace App\Controllers;

use App\Core\SimpleController;

class BookController extends SimpleController
{
    public function show()
    {
        return 'test';
    }

    public function  error404()
    {
        return 'Такой книги не существует';
    }


}