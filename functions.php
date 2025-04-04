<?php

function getCurrentDate()
{
    return date('Y-m-d');
}

function getCurrentYear()
{
    return date('Y');
}
function getCurrentMonth()
{
    return date('m');
}

function getCurrentDay()
{
    return date('d');
}

function getCurrentMonthName()
{
    return date('F');
}

function getDaysInMonth($month, $year)
{
    return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}

function getFirstDateOfMonth($month, $year)
{
    return "$year-$month-01";
}

function getLastDateOfMonth($month, $year)
{
    $daysInMonth = getDaysInMonth($month, $year);
    return "$year-$month-$daysInMonth";
}

function getFirstDayOfWeek($month, $year)
{
    return (date('w', strtotime("$year-$month-01")) + 6) % 7;
}

function getLastDayOfWeek($month, $year)
{
    $daysInMonth = getDaysInMonth($month, $year);
    return (date('w', strtotime("$year-$month-$daysInMonth")) + 6) % 7;
}

function getNextMonthDate($date)
{
    $dateTime = new DateTime($date);
    $dateTime->modify('+1 month');
    return $dateTime->format('Y-m-d');
}

function getPreviousMonthDate($date)
{
    $dateTime = new DateTime($date);
    $dateTime->modify('-1 month');
    return $dateTime->format('Y-m-d');
}

function getCurrentTime()
{
    return date('H:i');
}
