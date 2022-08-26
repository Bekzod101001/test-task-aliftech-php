<?php

namespace app\models;

use app\core\Application;
use app\core\DbModel;
use app\enums\UserStatus;

class Booking extends DbModel
{
    public static string $tableName = 'bookings';
    public array $attributes = ['start', 'end', 'name', 'surname', 'email', 'room_id'];

    public string $name;
    public string $surname;
    public string $email;
    public string $start;
    public string $end;
    public int $room_id;

    public function rules()
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
        ];
    }

}