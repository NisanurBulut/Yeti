<?php

use app\core\Application;

class m0004_create_table_app
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE tapp (
            id INT AUTO_INCREMENT PRIMARY KEY,
            app_name VARCHAR(255) NOT NULL,
            description VARCHAR(255) NOT NULL,
            db_name VARCHAR(255) NOT NULL,
            image_url VARCHAR(255) NOT NULL,
            access_url VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tapp;";
        $db->pdo->exec($SQL);
    }
}
