<?php

namespace app\adapters\Booking;

use app\adapters\ConsoleArgAdapter;
use app\core\ConsoleArgs;
use app\models\Room;

class ShowBookingConsoleArgAdapter extends ConsoleArgAdapter
{
    public string $start;
    public string $end;
    public Room $room;

    /**
     * @throws \app\exceptions\RecordNotFoundException
     */
    public function __construct(ConsoleArgs $consoleArgs)
    {
        $this->start = $consoleArgs->args[0];
        $this->end = $consoleArgs->args[1];
        $this->room = Room::findOrFail([
            'id' => $consoleArgs->args[2]
        ]);
    }
}