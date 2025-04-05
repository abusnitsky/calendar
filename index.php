<?php
require_once 'controllers/CalendarController.php';
require_once 'controllers/DayController.php';

$route = $_GET['route'] ?? 'calendar';

switch ($route) {
    case 'calendar':
        $controller = new CalendarController();
        echo $controller->handle();
        break;

    case 'day':
        $date = $_GET['date'] ?? null;
        $controller = new DayController();
        echo $controller->handle($date);
        break;

    default:
        http_response_code(404);
        echo '404 Not Found';
        break;
}