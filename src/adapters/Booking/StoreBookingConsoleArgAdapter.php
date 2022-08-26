<?php

namespace app\adapters\Booking;

use app\adapters\ConsoleArgAdapter;
use app\core\ConsoleArgs;
use app\models\Room;

class StoreBookingConsoleArgAdapter extends ConsoleArgAdapter
{
    public string $name;
    public string $surname;
    public string $email;
    public string $start;
    public string $end;
    public Room $room;

    /**
     * @throws \app\exceptions\RecordNotFoundException
     */
    public function __construct(ConsoleArgs $consoleArgs)
    {
        $this->name = $consoleArgs->args[0];
        $this->surname = $consoleArgs->args[1];
        $this->email = $consoleArgs->args[2];
        $this->start = $consoleArgs->args[3];
        $this->end = $consoleArgs->args[4];

        $this->room = Room::findOrFail([
            'id' => $consoleArgs->args[5]
        ]);
    }
}