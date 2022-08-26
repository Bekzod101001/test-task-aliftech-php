<?php

use app\controllers\BookingController;
use app\controllers\HelpController;
use app\controllers\RoomController;

require_once __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$app = new app\core\Application(dirname(__DIR__));

$app->commandRouter->add('help:commands', HelpController::class, 'commandsList');
$app->commandRouter->add('booking:store', BookingController::class, 'store');
$app->commandRouter->add('booking:check', BookingController::class, 'check');
$app->commandRouter->add('room:all', RoomController::class, 'index');

$app->run();