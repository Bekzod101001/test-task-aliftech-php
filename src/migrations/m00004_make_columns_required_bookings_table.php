<?php


use app\core\Migration;

class m00004_make_columns_required_bookings_table extends Migration {

    public function up()
    {
        $this->db->pdo->exec("
            ALTER TABLE bookings
                MODIFY surname VARCHAR(255) NOT NULL,
                MODIFY email VARCHAR(255) NOT NULL,
                MODIFY room_id int NOT NULL
        ");
    }

    public function down()
    {
    }

}