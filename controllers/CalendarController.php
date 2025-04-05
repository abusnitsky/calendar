<?php
require_once 'model/Calendar.php';

class CalendarController
{
    public function handle()
    {
        $calendar = new Calendar();
        $currentDateYm = $calendar->currentDateYm;
        $daysInMonth = $calendar->getDaysInMonth();
        $firstDayOfWeek = $calendar->getFirstDayOfWeek();

        require 'views/header.view.php';
        require 'views/calendar.view.php';
        require 'views/footer.view.php';
    }



}
