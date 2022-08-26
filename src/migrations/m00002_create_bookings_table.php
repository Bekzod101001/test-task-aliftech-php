<?php


use app\core\Migration;

class m00002_create_bookings_table extends Migration {

    public function up()
    {
        $this->db->pdo->exec("
            CREATE TABLE bookings (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                start TIME NOT NULL,
                end TIME NOT NULL,
                room_id INT,
                FOREIGN KEY (room_id) REFERENCES rooms(id)
            )  ENGINE=INNODB;
        ");
    }

    public function down()
    {
        $this->db->pdo->exec("
            DROP TABLE bookings;
        ");
    }

}