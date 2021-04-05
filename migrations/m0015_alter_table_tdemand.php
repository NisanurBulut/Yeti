<?php

use app\core\Application;

class m0015_alter_table_tdemand
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "ALTER TABLE tdemand ADD COLUMN status_id INT NOT NULL DEFAULT 0";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tdemand;";
        $db->pdo->exec($SQL);
    }
}
