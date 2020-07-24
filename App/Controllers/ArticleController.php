<?php

namespace App\Controllers;

use App\Core\SimpleController;
use App\Services\Request;

class ArticleController extends SimpleController
{

    public function index()
    {
        return 'ты на странице раздела';
    }

    public function all()
    {
        return 'Ты это сделал, красавчик';
    }

    public function add()
    {
        /** @var Request $service */
        $service = app('RequestLoad');

        if (!$service->is_post) {
            return <<<HTML
                <form method="post">
                    <input type="text" name="name" placeholder="Введите текст">
                    <button>Отправить</button>
                </form>
HTML;
        }

        dd($service->post('name'));
    }
}