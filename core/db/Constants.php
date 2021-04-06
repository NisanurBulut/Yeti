<?php

namespace app\core\db;

use app\core\Application;
use app\models\StatusJoinColor;

class SelectModel
{
    public function __construct($color, $name, $key)
    {
        $this->name = $name;
        $this->color = $color;
        $this->key = $key;
    }
    public string $color = "";
    public string $name = "";
    public string $key = "";
}

class Constants
{
    public static Constants $contants;
    public function __construct()
    {
        self::$contants = $this;
    }


    /**
     * Get the value of situations
     */
    public function getSituations()
    {
        $statusJoinModel = new StatusJoinColor();
        $query = self::spTstatusJoinWithtColor;
        $list = $statusJoinModel->executeRawQuery($query);
        return $list;
    }
    public function getStates()
    {
        return [
            new SelectModel("green", "Bekliyor", "Bekliyor"),
            new SelectModel("orange", "Görüldü", "Görüldü"),
            new SelectModel("red", "Devam ediyor", "Devam ediyor"),
            new SelectModel("red", "Tamamlandı", "Tamamlandı")
        ];
    }
    public const spTdemandJoinWithtApp = 'CALL sp_getDemandsFull';
    public const spTuserDemandJoinWithtApp = 'CALL sp_getUserDemandsFull(:paramid)';
    public const spTstatusJoinWithtColor = 'CALL sp_getSituationsFull';
    public const spGetDailyDemandsForChart = 'CALL sp_getDailyDemandsForChart';
    public const spGetAppDemandCountForChart = 'CALL sp_getAppDemandCountForChart';
    public const spGetDemandStateCount = 'CALL sp_getDemandStateCount';

}
