<?php

require_once 'helpers/view.php';

class DayController
{
    public function handle(string $date): string
    {

        $currentDate = $date;

        return $this->showDay($currentDate);
    }

    public function showDay(string $date): string
    {

        return renderView('views/day.view.php', [
            'currentDate' => $date,
        ]);
    }
}
