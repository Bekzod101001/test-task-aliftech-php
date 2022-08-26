<?php


namespace app\controllers;

use app\core\Application;
use app\core\ConsoleArgs;
use app\core\Controller;
use app\models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        print_r($rooms);
    }

}