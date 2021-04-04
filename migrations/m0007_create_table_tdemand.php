<?php

use app\core\Application;

class m0007_create_table_tdemand
{
    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE tdemand (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description VARCHAR(255) NOT NULL,
            owner_id INT NOT NULL DEFAULT 0,
            undertaking_id INT NOT NULL DEFAULT 0,
            state_id INT NOT NULL DEFAULT 0,
            status_id INT NOT NULL DEFAULT 0,
            app_id INT NOT NULL DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tdemand;";
        $db->pdo->exec($SQL);
    }
}
