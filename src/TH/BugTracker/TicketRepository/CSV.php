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
        $this->file->fputcsv(['name', 'description', 'createdAt']);
        $this->file->fputcsv([$ticket->name(), $ticket->description(), $ticket->createdAt()->format('c')]);
    }

    public function find($query)
    {
        $this->file->setFlags(\SplFileObject::READ_CSV);

        foreach ($this->file as $line) {
            list($name, $description, $createdAt) = $line;

            if ($name === $query) {
                return new Ticket($name, $description, new \DateTimeImmutable($createdAt));
            }
        }
    }
}
