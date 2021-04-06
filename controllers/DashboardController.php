<?php

namespace app\controllers;

use app\core\Request;
use app\models\Demand;
use app\core\Controller;
use app\core\Application;
use app\core\db\Constants;
use app\core\middlewares\AuthMiddleware;

class DashboardController extends Controller {

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['dashboard']));
        Application::$app->view->title = 'Dashboard';
    }
    public function dashboard()
    {
        return $this->render('dashboard/index');
    }
    public function getDaiylDemands()
    {
        $query = Constants::spGetDailyDemandsForChart;
        $demandEntity = new Demand();
        $result = $demandEntity->executeRawQuery($query);
        return json_encode($result);
    }
}
