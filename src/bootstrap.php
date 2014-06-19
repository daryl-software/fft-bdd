<?php

use TH\BugTracker\TicketRepository\CSV;
use TH\BugTracker\UseCase\TicketCreation;

require_once __DIR__.'/../vendor/autoload.php';
date_default_timezone_set('Europe/Paris');
session_start();

$container = new Pimple;

$container['ticket-repository'] = function($c) {
    return new CSV(new \splFileObject(__DIR__.'/../private/tickets.csv', 'a+'));
};

$container['ticket-creation'] = function($c) {
    return new TicketCreation($c['ticket-repository']);
};

return $container;
