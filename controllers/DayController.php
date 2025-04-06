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
        $content = renderView('day', [
            'currentDate' => $date
        ]);

        return renderView('layout', ['content' => $content]);
    }
}
