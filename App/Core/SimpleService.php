<?php

namespace App\Core;

use App\App;

class SimpleService
{

    public $config;

    protected $app;

    /**
     * SimpleService constructor.
     *
     * @param App $app - экземпляр нашего приложения чтобы в каждом сервисе был к нему доступ изнутри
     * @param array $params - параметры которые указываем в конфиге app
     */
    public function __construct(App $app, array $params = [])
    {
        $this->config = $params;
        $this->app = $app;

    }


}