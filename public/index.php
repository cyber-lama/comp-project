<?php

include_once '../vendor/autoload.php';

use App\App;

$app = new App();

exit($app->init());