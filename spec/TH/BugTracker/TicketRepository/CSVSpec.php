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
        date_default_timezone_set('Europe/Paris');
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
        $ticket->createdAt()->willReturn(new \DateTimeImmutable('2014-06-20 16:00:00'));

        $this->save($ticket);

        assert(file_get_contents($this->file->getPathname()) === <<<CSV
name,description,createdAt
"Ticket 1","Ticket 1 description",2014-06-20T16:00:00+02:00

CSV
        );
    }

    function it_should_find_tickets() {
        file_put_contents($this->file->getPathname(), <<<CSV
name,description,createdAt
"Ticket 1","Ticket 1 description",2014-06-20T16:00:00+02:00
"Ticket 2","Ticket 2 description",2014-06-20T16:10:00+02:00

CSV
        );

        $ticket = new Ticket('Ticket 1', 'Ticket 1 description', new \DateTimeImmutable('2014-06-20 16:00:00'));
        $this->find('Ticket 1')->shouldBeLike($ticket);
    }
}
