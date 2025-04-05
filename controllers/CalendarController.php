<?php
require_once 'model/Calendar.php';

class CalendarController
{
    public function handle()
    {
        $currentDateYm = isset($_GET['Date']) ? $_GET['Date'] : date('Y-m');

        list($year, $month) = explode('-', $currentDateYm);
        $calendar = new Calendar($year, $month);

        if (isset($_GET['Prev'])) {
            $calendar->setPreviousMonth();
        } elseif (isset($_GET['Next'])) {
            $calendar->setNextMonth();
        } 

        $currentDateYm = $calendar->currentDateYm;
        $daysInMonth = $calendar->getDaysInMonth();
        $firstDayOfWeek = $calendar->getFirstDayOfWeek();

        require 'views/header.view.php';
        require 'views/calendar.view.php';
        require 'views/footer.view.php';
    }
}
