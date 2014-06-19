<?php

namespace TH\BugTracker;

use TH\BugTracker\Ticket;

interface TicketRepository
{
    public function save(Ticket $ticket);
}
