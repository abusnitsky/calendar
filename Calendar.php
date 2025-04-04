<?php

class Calendar
{
    public $currentDate;
    public $currentYear;
    public $currentMonth;
    public $currentDay;

    public function __construct()
    {
        $this->currentDate = date('Y-m-d');
        $this->currentYear = date('Y');
        $this->currentMonth = date('m');
        $this->currentDay = date('d');
    }

    public function setCurrentDate($date)
    {
        $this->currentDate = $date;
        $this->currentYear = date('Y', strtotime($date));
        $this->currentMonth = date('m', strtotime($date));
        $this->currentDay = date('d', strtotime($date));
    }

    public function setCurrentMonthFromPicker($pickerMonth)
    {
        $yearAndMonth = explode('-', $pickerMonth);
         $this->currentYear= (int)$yearAndMonth[0];
         $this->currentMonth= (int)$yearAndMonth[1];
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
        return cal_days_in_month(CAL_GREGORIAN, $this->currentMonth, $this->currentYear);
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
