<?php

use app\core\Application;

class m0005_delete_table_users
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE users
        ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->pdo->exec($SQL);
    }
}
