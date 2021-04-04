<?php

use app\core\Application;

class m0009_create_table_tstate
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE tstate (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tstate;";
        $db->pdo->exec($SQL);
    }
}
