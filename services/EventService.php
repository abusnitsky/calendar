<?php

require_once __DIR__ . '/../core/Database.php';

class EventService extends db
{
    public function getEventsByDate(string $date): array
    {
        return $this->query("SELECT * FROM events WHERE date = ?", [$date]);
    }
}
