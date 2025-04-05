<?php

class DayController {
    public function handle(string $date): string {

        $currentDate = $date;

        // Include view and capture output
        ob_start();
        include 'views/day.view.php';
        return ob_get_clean();
    }
}