<?php

include_once '../vendor/autoload.php';

use App\App;

$app = new App();

exit($app->init());

/**
 * Задача
 *
 * 1. Подключить vue
 * 2. Сделать форму по роуту /chat
 * 3. Сделать добавление в базу данных через mysqli и INSERT INTO
 * 4. Сделать получение записей через mysqli и SELECT
 * 5. Попытаться впихнуть это в сервис
 */