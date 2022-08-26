<?php


namespace app\controllers;

use app\adapters\Booking\ShowBookingConsoleArgAdapter;
use app\adapters\Booking\StoreBookingConsoleArgAdapter;
use app\core\Application;
use app\core\ConsoleArgs;
use app\core\Controller;
use app\models\Booking;

class HelpController extends Controller
{

    public function commandsList()
    {
        echo "
            How To Test Commands: php index.php %command-name% ...%args%
            
            List Of All Commands: 
                - room:all. Description: get list of rooms. 
                    Example: php index.php room:all
                    
                - booking:check %startTime% %endTime% %roomId%. Description: check if room is already booked
                    Example: php index.php booking:check 15:00 16:00 1
               
                - booking:store %name% %surname% %email% %startTime% %endTime% %roomId%. Description: Book a room for specific time by room id (as last arg)
                    Example: php index.php booking:store Bekzod Bobokhonov itprogressuz@gmail.com 15:00 16:00 1
        " . PHP_EOL;
    }


}