<?php

use app\core\Application;
use app\controllers\AppsController;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\UsersController;
use app\controllers\DemandsController;

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
$app->router->post('/users/storeUser', [UsersController::class,'storeUser']);
$app->router->delete('/users/deleteUser', [UsersController::class,'deleteUser']);
$app->router->get('/users/editUser', [UsersController::class,'editUser']);
$app->router->get('/users/createUser', [UsersController::class,'createUser']);
$app->router->post('/users/updateUser', [UsersController::class,'updateUser']);

$app->router->get('/demands', [DemandsController::class,'index']);
$app->router->post('/demands/storeDemand', [DemandsController::class,'storeDemand']);
$app->router->delete('/demands/deleteDemand', [DemandsController::class,'deleteDemand']);
$app->router->get('/demands/editDemand', [DemandsController::class,'editDemand']);
$app->router->get('/demands/createDemand', [DemandsController::class,'createDemand']);
$app->router->post('/demands/updateDemand', [DemandsController::class,'updateDemand']);


$app->router->get('/login', [AuthController::class,'login']);
$app->router->post('/login', [AuthController::class,'login']);
$app->router->get('/register', [AuthController::class,'register']);
$app->router->post('/register', [AuthController::class,'register']);

$app->run();
