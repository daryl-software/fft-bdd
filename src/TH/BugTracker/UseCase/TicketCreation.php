<?php

namespace TH\BugTracker\UseCase;

use TH\BugTracker\TicketRepository;
use TH\BugTracker\Ticket;

class TicketCreation
{
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function exec($name, $description)
    {
        $ticket = new Ticket($name, $description, new \DateTimeImmutable);
        $this->ticketRepository->save($ticket);

        return true;
    }
}
