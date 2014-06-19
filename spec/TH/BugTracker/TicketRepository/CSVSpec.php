<?php

namespace spec\TH\BugTracker\TicketRepository;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use VirtualFileSystem\FileSystem;
use TH\BugTracker\Ticket;

class CSVSpec extends ObjectBehavior
{
    private $fs;
    private $file;

    public function let() {
        $this->fs = new FileSystem;
        $this->file = new \splFileObject($this->fs->path('/tickets.csv'), 'w+');

        $this->beConstructedWith($this->file);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('TH\BugTracker\TicketRepository\CSV');
        $this->shouldImplement('TH\BugTracker\TicketRepository');
    }

    function it_should_save_a_ticket(Ticket $ticket) {
        $ticket->name()->willReturn('Ticket 1');
        $ticket->description()->willReturn('Ticket 1 description');

        $this->save($ticket);

        assert(file_get_contents($this->file->getPathname()) === <<<CSV
name,description
"Ticket 1","Ticket 1 description"

CSV
        );
    }
}
