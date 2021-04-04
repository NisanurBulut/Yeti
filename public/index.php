<?php

use app\core\Application;
use app\controllers\AppsController;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\UsersController;

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
$app->router->post('/contact', [HomeController::class,'handleContact']);

$app->router->get('/apps', [AppsController::class,'index']);
$app->router->post('/apps/storeApp', [AppsController::class,'storeApp']);
$app->router->delete('/apps/deleteApp', [AppsController::class,'deleteApp']);
$app->router->get('/apps/editApp', [AppsController::class,'editApp']);
$app->router->get('/apps/createApp', [AppsController::class,'createApp']);
$app->router->post('/apps/updateApp', [AppsController::class,'updateApp']);

$app->router->get('/users', [UsersController::class,'index']);
$app->router->post('/users/storeUser', [AppsController::class,'storeUser']);
$app->router->delete('/users/deleteUser', [AppsController::class,'deleteUser']);
$app->router->get('/users/editUser', [AppsController::class,'editUser']);
$app->router->get('/users/createUser', [AppsController::class,'createUser']);
$app->router->post('/users/updateUser', [AppsController::class,'updateUser']);



$app->router->get('/login', [AuthController::class,'login']);
$app->router->post('/login', [AuthController::class,'login']);
$app->router->get('/register', [AuthController::class,'register']);
$app->router->post('/register', [AuthController::class,'register']);

$app->run();
