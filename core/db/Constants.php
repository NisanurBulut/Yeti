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

    public const tDemandJoinWithtApp = '
    SELECT td.id, td.title, td.description, td.state,td.status_id, ts.name AS "status", tc.name AS "color",
    tp.app_name AS "appName", tu1.username AS "ownerUsername",tu1.image_url AS "ownerImageUrl",
    tu2.username AS "takedUsername", tu1.name_surname AS "ownerNamesurname",tu2.image_url AS "takedImageUrl",
    tu2.name_surname AS "takedNamesurname",
    TIMESTAMPDIFF(HOUR, td.created_at, NOW())
       as "differenceTime"
    FROM tdemand td left join tapp AS tp on tp.id=td.app_id
    left join tuser AS tu1 on tu1.id=td.owner_id
    left join tuser AS tu2 on tu2.id=td.undertaking_id
    left join tstatus AS ts on ts.id=td.status_id
    left join tcolor AS tc on tc.id=ts.color_id
    ';

    public const tStatusJoinWithtColor = 'SELECT ts.id AS "key", ts.name AS "name", tc.name AS "color" FROM `tstatus`  As ts inner join tColor tc on tc.id=ts.color_id';
}
