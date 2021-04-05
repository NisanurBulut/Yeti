<?php

namespace app\core\db;

use app\core\Application;

class SelectModel
{
    public function __construct($color, $name, $key)
    {
        $this->name = $name;
        $this->color = $color;
        $this->key=$key;
    }
    public string $color = "";
    public string $name = "";
    public string $key = "";
}

class Constants
{
    public static Constants $contants;
    public function __construct(){
        self::$contants = $this;
    }


    /**
     * Get the value of situations
     */
    public function getSituations()
    {
        return [
            new SelectModel("green", "Normal","0"),
            new SelectModel("orange", "Acil","1"),
            new SelectModel("red", "Çok Acil","2")
        ];
    }

    /**
     * Get the value of states
     */
    public function getStates()
    {
        return [
            new SelectModel("green", "Bekliyor","0"),
            new SelectModel("orange", "Görüldü","1"),
            new SelectModel("red", "Devam Ediyor","2"),
            new SelectModel("red", "Tamamlandı","2")
        ];
    }
}