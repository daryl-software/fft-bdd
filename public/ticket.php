<?php

use TH\BugTracker\TicketRepository\CSV;
use TH\BugTracker\UseCase\TicketCreation;

require_once __DIR__.'/../vendor/autoload.php';
date_default_timezone_set('Europe/Paris');
session_start();

$ticketRepository = new CSV(new \splFileObject(__DIR__.'/../private/tickets.csv', 'a+'));

$ticket = $ticketRepository->find($_GET['name']);

$notice = isset($_SESSION['new_ticket_notice']);
unset($_SESSION['new_ticket_notice']);
?>
<!DOCTYPE html>

<h1><?= $ticket->name() ?></h1>

<?php if ($notice): ?>
    <h2>Ticket created</h2>
<?php endif; ?>

<p><?= $ticket->description() ?></p>
