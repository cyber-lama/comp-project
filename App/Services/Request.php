<?php

namespace App\Services;

use App\App;
use App\Core\SimpleService;

class Request extends SimpleService
{
    public $is_post = false;
    public $is_get = false;

    protected $request = null;

    public function __construct(App $app, array $params = [])
    {
        $this->request = $_REQUEST;

        if (!count($this->request)) {
            parent::__construct($app, $params);
            return;
        }

        if (count($_POST)) {
            $this->is_post = true;
        }

        if (count($_GET)) {
            $this->is_get = true;
        }

    }

    public function get(string $key)
    {
        return trim($_GET[$key]) ?? null; //Если нет $key возвращаем null
    }

    public function post(string $key)
    {
        return trim($_POST[$key]) ?? null;
    }

    public function all()
    {
        return $this->request;
    }
}