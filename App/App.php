<?php

namespace App;

use Exception;

class App
{

    protected $services = []; //Сервисы которые мы загружаем

    protected $config; //тут хранится глобальная конфигурация нашего приложения

    static $instance;

    public function __construct()
    {

        $this->config = include '../config/app.php'; //тянем конфиг
        $this->loadServices(); //вызываем метод подгрузки файлов
        self::$instance = $this;
    }

    /**
     * Метод автозагрузки классов из конфига
     */
    protected function loadServices()
    {
        foreach ($this->config['services'] as $serviceName => $service) {
            $this->services[$serviceName] = new $service['class']($this, $service['params']); //Инициализируем
        }
    }

    /**
     * Возвращает сервис по его названию
     *
     * @param string $serviceName
     * @return mixed
     * @throws Exception
     */
    public function getService(string $serviceName)
    {
        if (!array_key_exists($serviceName, $this->services)) {
            throw new Exception("Сервиса $serviceName не существует");
        }
        return $this->services[$serviceName];
    }

    public function init()
    {
        $requestArray = explode('/', $_SERVER['REQUEST_URI']);

        if (!$requestArray[1]) {
            $controller = 'App\\Controllers\\' . 'ChatController';
        } else {
            $controller = 'App\\Controllers\\' . ucfirst($requestArray[1]) . 'Controller';
        }
        $method = explode('?', $requestArray[2])[0];

        $controllerClass = new $controller();
//       dd($controller, $method, $requestArray);

        if (!$method) {
            return $controllerClass->index();
        }

        if (!method_exists($controllerClass, $method)) {
            return $controllerClass->error404();
        }
        return $controllerClass->$method();

    }

}