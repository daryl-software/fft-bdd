<?php

use TH\BugTracker\TicketRepository\CSV;
use TH\BugTracker\UseCase\TicketCreation;

require_once __DIR__.'/../vendor/autoload.php';
date_default_timezone_set('Europe/Paris');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ticketRepository = new CSV(new \splFileObject(__DIR__.'/../private/tickets.csv', 'a+'));
    $ticketCreation = new TicketCreation($ticketRepository);

    $ticketCreation->exec($_POST['name'], $_POST['description']);

    $_SESSION['new_ticket_notice'] = true;

    header('location: /ticket.php?name='.urlencode($_POST['name']), 303);
    exit;
}

?>
<!DOCTYPE html>
<h1>Ticket Creation</h1>
<form method="post">
    <label>
        name
        <input name="name"/>
    </label><br/>
    <label>
        description
        <textarea name="description"></textarea>
    </label>
    <input type="submit" value="Create ticket"/>
</form>
