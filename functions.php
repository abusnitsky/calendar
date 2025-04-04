<?php

function getCurrentDate() {
    return date('Y-m-d');
}

function getNextMonthDate($date) {
    $dateTime = new DateTime($date);
    $dateTime->modify('+1 month');
    return $dateTime->format('Y-m-d');
}

function getPreviousMonthDate($date) {
    $dateTime = new DateTime($date);
    $dateTime->modify('-1 month');
    return $dateTime->format('Y-m-d');
}

function getCurrentTime() {
    return date('H:i');
}


