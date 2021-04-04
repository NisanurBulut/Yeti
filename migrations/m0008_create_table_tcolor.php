<?php

use app\core\Application;

class m0008_create_table_tcolor
{

    public function up()
    {
        $db = Application::$app->db;
        $SQL = "CREATE TABLE tcolor (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down()
    {
        $db = Application::$app->db;
        $SQL = "DROP TABLE tcolor;";
        $db->pdo->exec($SQL);
    }
}
