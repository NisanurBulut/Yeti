<?php

use app\core\Application;
use app\controllers\AppsController;
use app\controllers\AuthController;
use app\controllers\HomeController;

 define("APP_URL","http://localhost:8080/");

require_once  __DIR__.'/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config=[
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
    ];

$app = new Application(dirname((__DIR__)), $config);


$app->router->get('/', [HomeController::class,'home']);
$app->router->get('/apps', [AppsController::class,'index']);
$app->router->post('/apps/storeApp', [AppsController::class,'storeApp']);

$app->router->post('/contact', [HomeController::class,'handleContact']);

$app->router->get('/login', [AuthController::class,'login']);
$app->router->post('/login', [AuthController::class,'login']);
$app->router->get('/register', [AuthController::class,'register']);
$app->router->post('/register', [AuthController::class,'register']);

$app->run();
