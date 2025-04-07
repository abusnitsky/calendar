<?php

require_once __DIR__ . '/../core/Database.php';

class EventService extends db
{
    public function getEventsByDate(string $date): array
    {
        return $this->query("SELECT * FROM events WHERE date = ?", [$date]);
    }

    public function getEventsByMonth(string $month): array
    {
        return $this->query("SELECT * FROM events WHERE date LIKE ?", ["$month%"]);
    }

    public function deleteEvent(int $id): bool
    {
        return $this->execute("DELETE FROM events WHERE id = ?", [$id]) > 0;
    }

    public function addEvent(string $text, bool $important = false, string $date, string $time): bool
    {
        return $this->execute(
            "INSERT INTO events (text, important, date, time) VALUES (?, ?, ?, ?)", 
            [$text, $important, $date, $time])> 0;
    }
}
