<?php


use app\core\Migration;

class m00003_add_new_columns_to_bookings_table extends Migration {

    public function up()
    {
        $this->db->pdo->exec("
            ALTER TABLE bookings
                ADD email VARCHAR(255),
                ADD surname VARCHAR(255)
        ");
    }

    public function down()
    {
    }

}