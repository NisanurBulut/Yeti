<?php

use app\core\Application;

class m0013_create_table_tstatus
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE tstatus (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            color_id INT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tstatus;";
        $db->pdo->exec($SQL);
    }
}
