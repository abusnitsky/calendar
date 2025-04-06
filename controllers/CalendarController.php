<?php
require_once __DIR__ . '/../models/Calendar.php';
require_once __DIR__ . '/../helpers/view.php';


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

        $currentDateYm = $calendar->getCurrentDate('Y-m');
        $daysInMonth = $calendar->getDaysInMonth();
        $firstDayOfWeek = $calendar->getFirstDayOfWeek();

        $content = renderView('calendar', [
            'currentDateYm' => $currentDateYm,
            'daysInMonth' => $daysInMonth,
            'firstDayOfWeek' => $firstDayOfWeek,
        ]);

        return renderView('layout', ['content' => $content]);
    }
}
