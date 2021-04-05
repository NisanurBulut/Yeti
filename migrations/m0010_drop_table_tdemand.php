<?php

use app\core\Application;
class m0010_drop_table_tdemand
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tdemand;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tdemand;";
        $db->pdo->exec($SQL);
    }
}
