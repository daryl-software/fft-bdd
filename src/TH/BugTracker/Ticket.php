<?php

namespace TH\BugTracker;

class Ticket
{
    private $name;

    private $description;

    private $createdAt;

    public function __construct($name, $description, \DateTimeImmutable $createdAt)
    {
        $this->name = $name;
        $this->description = $description;
        $this->createdAt = $createdAt;
    }

    public function name()
    {
        return $this->name;
    }

    public function description()
    {
        return $this->description;
    }

    public function createdAt()
    {
        return $this->createdAt;
    }
}
