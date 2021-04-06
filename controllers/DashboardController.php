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
    public function getDailyDemands()
    {
        $query = Constants::spGetDailyDemandsForChart;
        $demandEntity = new Demand();
        $result = $demandEntity->executeRawQuery($query);
        $data = [
            "xAxis"=>array_column($result,"x"),
            "yAxis"=>array_column($result,"y")
        ];
        return json_encode($data);
    }
    public function getAppDemandCountList()
    {
        $query = Constants::spGetAppDemandCountForChart;
        $demandEntity = new Demand();
        $result = $demandEntity->executeRawQuery($query);
        return json_encode($result);
    }
    public function getAppDemandStateCount()
    {
        $query = Constants::spGetAppDemandStateCount;
        $demandEntity = new Demand();
        $results = $demandEntity->executeRawQuery($query);
        $data=array();
        foreach($results as $result){
            $new=[$result->state, floatval($result->count)];
            array_push($data,$new);
        }
        return json_encode($data);
    }
    function object_to_array($data)
    {
        if (is_array($data) || is_object($data))
        {
            $result = array();
            foreach ($data as $key => $value)
            {
                $result[$key] = $this->object_to_array($value);
            }
            return $result;
        }
        return $data;
    }
}
