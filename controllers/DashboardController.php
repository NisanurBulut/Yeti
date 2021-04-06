<?php

namespace app\controllers;

use app\core\Request;
use app\models\Demand;
use app\core\Controller;
use app\core\Application;
use app\core\middlewares\AuthMiddleware;

class DashboardController extends Controller {

    public function __construct()
    {
        Application::$app->view->title = 'Dashboard';
    }
    public function dashboard()
    {
        return $this->render('dashboard/index');
    }

}