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
        $query = self::tStatusJoinWithtColor;
        $list = $statusJoinModel->executeRawQuery($query);
        return $list;
    }
    public function getStates()
    {
        return [
            new SelectModel("green", "Bekliyor", "0"),
            new SelectModel("orange", "Görüldü", "1"),
            new SelectModel("red", "Devam Ediyor", "2"),
            new SelectModel("red", "Tamamlandı", "2")
        ];
    }
    public function getWithParamQuery($paramid, $query):string{
         $concat = implode('',array($query,'(',$paramid,')'));

        return $concat;
    }
    public const tDemandJoinWithtApp = 'CALL sp_getDemandsFull';
    public const tUserDemandJoinWithtApp = 'CALL sp_getUserDemandsFull(:paramid)';
    public const tStatusJoinWithtColor = 'CALL sp_getSituationsFull';
}
