<?php

class Day
{
    private string $date;
    private array $events;


    public function __construct(string $date, array $events = [])
    {
        $this->date = $date;
        $this->events = $events;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getEvents(): array
    {
        return $this->events;
    }
}
