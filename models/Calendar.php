<?php

include_once 'config/Database.php';

class Calendar extends db
{
    private string $currentDate;

    public function __construct($year = null, $month = null)
    {
        if ($year && $month) {
            $this->setCurrentDate("$year-$month-1");
        } else {
            $this->setCurrentDate(date('Y-m-d'));
        }
    }

    public function getCurrentDate(string $format = ''): string
    {
        if ($format === 'Y-m') {
            return date('Y-m', strtotime($this->currentDate));
        } elseif ($format === 'Y') {
            return date('Y', strtotime($this->currentDate));
        } elseif ($format === 'm') {
            return date('m', strtotime($this->currentDate));
        } elseif ($format === 'd') {
            return date('d', strtotime($this->currentDate));
        }
        
        return $this->currentDate;  // Default format is 'Y-m-d'
    }

    public function setCurrentDate($date)
    {
        $this->currentDate = $date;
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

    public function getDaysInMonth(): array
    {
        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $this->getCurrentDate('m'), $this->getCurrentDate('Y'));
        
        return range(1, $daysInMonth);
    }

    public function getFirstDateOfMonth(): string
    {
        return $this->getCurrentDate('Y-m') . "-01";
    }

    public function getFirstDayOfWeek(): int
    {
        return (date('w', strtotime($this->getCurrentDate('Y-m')."-01")) + 6) % 7;
    }
}
