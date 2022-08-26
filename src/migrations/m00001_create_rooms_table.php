<?php


use app\core\Migration;

class m00001_create_rooms_table extends Migration {

    public function up()
    {
        $this->db->pdo->exec("
            CREATE TABLE IF NOT EXISTS rooms (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL
            ) ENGINE=INNODB;
        ");
        $this->db->pdo->exec("
            INSERT 
                INTO rooms (name)
            VALUES
                ('First Room'),
                ('Second Room'),
                ('Third Room'),
                ('Fourth Room'),
                ('Fifth Room')
        ");
    }

    public function down()
    {
        $this->db->pdo->exec("
            DROP TABLE users;
        ");
    }

}