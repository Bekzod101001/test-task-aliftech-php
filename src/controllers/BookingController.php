<?php


namespace app\controllers;

use app\adapters\Booking\ShowBookingConsoleArgAdapter;
use app\adapters\Booking\StoreBookingConsoleArgAdapter;
use app\core\Application;
use app\core\ConsoleArgs;
use app\core\Controller;
use app\models\Booking;

class BookingController extends Controller
{

    /**
     * @throws \app\exceptions\RecordNotFoundException
     */
    public function store(ConsoleArgs $consoleArgs)
    {
        $args = new StoreBookingConsoleArgAdapter($consoleArgs);

        $booking = Booking::find([
            'start' => $args->start,
            'end' => $args->end,
            'room_id' => $args->room->id,
        ]);

        if ($booking) {
            echo "Room is already booked by $booking->name $booking->surname ($booking->email)" . PHP_EOL;
            return false;
        }

        $newBooking = new Booking();
        $newBooking->name = $args->name;
        $newBooking->surname = $args->surname;
        $newBooking->email = $args->email;
        $newBooking->start = $args->start;
        $newBooking->end = $args->end;
        $newBooking->room_id = $args->room->id;

        if(!$newBooking->validate()){
            echo $newBooking->getErrors();
            return false;
        }

        $newBooking->save();

        echo 'Room is successfully booked' . PHP_EOL;
    }

    /**
     * @throws \app\exceptions\RecordNotFoundException
     */
    public function check(ConsoleArgs $consoleArgs)
    {

        $args = new ShowBookingConsoleArgAdapter($consoleArgs);

        $booking = Booking::find([
            'start' => $args->start,
            'end' => $args->end,
            'room_id' => $args->room->id,
        ]);

        if(!$booking) {
            echo 'Room is empty' . PHP_EOL;
            return true;
        }

        $emailOfBooking = $booking['email'];
        $fullNameOfBooking = $booking['name'] . ' ' . $booking['surname'];
        return "Room is booked by $fullNameOfBooking ($emailOfBooking)";
    }

}