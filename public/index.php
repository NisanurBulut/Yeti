<?php

use app\controllers\AppsController;
use app\controllers\HomeController;
use app\core\Application;

require_once  __DIR__.'/../vendor/autoload.php';

$app = new Application(dirname((__DIR__)));


$app->router->get('/', [HomeController::class,'home']);
$app->router->get('/apps', [AppsController::class,'index']);
$app->router->post('/contact', [HomeController::class,'handleContact']);


$app->run();
