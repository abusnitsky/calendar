<?php

require_once __DIR__ . '/../helpers/view.php';
require_once __DIR__ . '/../services/EventService.php';

class DayController
{
    public function handle(string $date): string
    {
        $currentDate = $date;

        return $this->showDay($currentDate);
    }

    public function showDay(string $date): string
    {

        $eventService = new EventService();
        $events = $eventService->getEventsByDate($date);

        $content = renderView('day', [
            'currentDate' => $date,
            'events' => $events,
        ]);

        return renderView('layout', ['content' => $content]);
    }
}
