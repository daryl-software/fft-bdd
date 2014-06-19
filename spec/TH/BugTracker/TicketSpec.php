<?php

namespace spec\TH\BugTracker;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TicketSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        date_default_timezone_set('Europe/Paris');
        $this->beConstructedWith('name', 'description', new \DateTimeImmutable('2014-06-20 16:00:00'));
        
        $this->shouldHaveType('TH\BugTracker\Ticket');

        $this->name()->shouldReturn('name');
        $this->description()->shouldReturn('description');
        $this->createdAt()->shouldBeLike(new \DateTimeImmutable('2014-06-20 16:00:00'));
    }
}
