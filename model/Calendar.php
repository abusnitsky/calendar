<?php

class Calendar
{
    public $currentDate;
    public $currentDateYm;
    public $currentYear;
    public $currentMonth;
    public $currentDay;

    public function __construct($year = null, $month = null)
    {
        if ($year && $month) {
            $this->setCurrentDate("$year-$month-1");
        } else {
            $this->setCurrentDate(date('Y-m-d'));
        }
    }

    public function setCurrentDate($date)
    {
        $this->currentDate = $date;
        $this->currentDateYm = date('Y-m', strtotime($date));
        $this->currentYear = date('Y', strtotime($date));
        $this->currentMonth = date('m', strtotime($date));
        $this->currentDay = date('d', strtotime($date));
    }

    public function setNextMonth()
    {
        $dateTime = new DateTime($this->currentDate);
        $dateTime->modify('+1 month');
        $this->setCurrentDate($dateTime->format('Y-m-d'));
    }

    public function setPreviousMonth()
    {
        $dateTime = new DateTime($this->currentDate);
        $dateTime->modify('-1 month');
        $this->setCurrentDate($dateTime->format('Y-m-d'));
    }

    public function getDaysInMonth()
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->currentMonth, $this->currentYear);
        return range(1, $daysInMonth);
    }

    public function getFirstDateOfMonth()
    {
        return "$this->currentYear-$this->currentMonth-01";
    }

    public function getFirstDayOfWeek()
    {
        return (date('w', strtotime("$this->currentYear-$this->currentMonth-01")) + 6) % 7;
    }
}
