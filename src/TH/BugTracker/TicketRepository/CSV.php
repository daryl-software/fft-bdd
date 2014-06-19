<?php

namespace TH\BugTracker\TicketRepository;

use TH\BugTracker\TicketRepository;
use TH\BugTracker\Ticket;

class CSV implements TicketRepository
{
    private $file;

    public function __construct(\splFileObject $file)
    {
        $this->file = $file;
    }

    public function save(Ticket $ticket) {
        $this->file->fputcsv(['name', 'description']);
        $this->file->fputcsv([$ticket->name(), $ticket->description()]);
    }
}
