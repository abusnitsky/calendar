<?php

function renderView(string $viewFile, array $data = []): string {
    extract($data); 
    ob_start();
    include $viewFile;
    return ob_get_clean();
}