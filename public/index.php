<?php

use app\models\User;
use app\core\Application;
use app\core\db\Constants;
use app\controllers\AppsController;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\UsersController;
use app\controllers\DemandsController;
use app\controllers\DashboardController;

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
$constats = new Constants();

$app->router->get('/', [DashboardController::class,'dashboard']);
$app->router->get('/dashboard', [DashboardController::class,'dashboard']);
$app->router->get('/getDailyDemands', [DashboardController::class,'getDailyDemands']);
$app->router->get('/getAppDemandCountList', [DashboardController::class,'getAppDemandCountList']);


$app->router->get('/apps', [AppsController::class,'index']);
$app->router->post('/apps/storeApp', [AppsController::class,'storeApp']);
$app->router->delete('/apps/destroyApp', [AppsController::class,'destroyApp']);
$app->router->get('/apps/editApp', [AppsController::class,'editApp']);
$app->router->get('/apps/createApp', [AppsController::class,'createApp']);
$app->router->post('/apps/updateApp', [AppsController::class,'updateApp']);

$app->router->get('/users', [UsersController::class,'index']);
$app->router->post('/users/storeUser', [UsersController::class,'storeUser']);
$app->router->delete('/users/destroyUser', [UsersController::class,'destroyUser']);
$app->router->get('/users/editUser', [UsersController::class,'editUser']);
$app->router->get('/users/createUser', [UsersController::class,'createUser']);
$app->router->post('/users/updateUser', [UsersController::class,'updateUser']);

$app->router->get('/demands', [DemandsController::class,'index']);
$app->router->get('/demands/getDemands', [DemandsController::class,'getDemands']);
$app->router->post('/demands/storeDemand', [DemandsController::class,'storeDemand']);
$app->router->delete('/demands/destroyDemand', [DemandsController::class,'destroyDemand']);
$app->router->get('/demands/editDemand', [DemandsController::class,'editDemand']);
$app->router->get('/demands/createDemand', [DemandsController::class,'createDemand']);
$app->router->post('/demands/updateDemand', [DemandsController::class,'updateDemand']);


$app->router->get('/auth/login', [AuthController::class,'login']);
$app->router->post('/auth/storeLogin', [AuthController::class,'storeLogin']);
$app->router->get('/auth/logout', [AuthController::class,'logout']);

$app->run();
