<?php


namespace App\Controllers;


use App\Core\SimpleController;

class CommentsController extends SimpleController
{
    public function index()
    {
        return 'Вы на странице для вывода всех комментариев';
    }
}