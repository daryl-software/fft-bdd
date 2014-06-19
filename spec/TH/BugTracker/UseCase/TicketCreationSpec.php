<?php

namespace spec\TH\BugTracker\UseCase;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use TH\BugTracker\TicketRepository;

class TicketCreationSpec extends ObjectBehavior
{
    function let(TicketRepository $tickets)
    {
        $this->beConstructedWith($tickets);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType('TH\BugTracker\UseCase\TicketCreation');
    }

    function it_should_create_a_ticket(TicketRepository $tickets)
    {
        $tickets->save(Argument::type('TH\BugTracker\Ticket'))->shouldBeCalled();
        $this->exec('name', 'description')->shouldReturn(true);
    }
}
