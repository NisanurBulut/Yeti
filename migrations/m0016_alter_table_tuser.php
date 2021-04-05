<?php

use app\core\Application;

class m0016_alter_table_tuser
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "ALTER TABLE tuser ADD COLUMN password VARCHAR(255) NOT NULL DEFAULT 0";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tuser;";
        $db->pdo->exec($SQL);
    }
}
