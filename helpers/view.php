<?php

function renderView(string $view, array $data = []): string
{
    extract($data);

    ob_start();

    require __DIR__ . '/../views/' . $view . '.view.php';

    return ob_get_clean();
}
