<?php

use app\core\Application;

class m0006_create_table_tuser
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE tuser (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name_surname VARCHAR(255) NOT NULL,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            image_url VARCHAR(255) NOT NULL,
            is_admin boolean NOT NULL DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tuser;";
        $db->pdo->exec($SQL);
    }
}
