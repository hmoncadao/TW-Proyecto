<?php
// Router para desarrollo con PHP integrado
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = str_replace('/backend', '', $uri);

// Si es un archivo estático, servir normalmente
if (file_exists(__DIR__ . $uri) && is_file(__DIR__ . $uri)) {
    return false;
}

// Servir el index.blade.php para todas las rutas
require_once __DIR__ . '/blade-processor.php';
renderPage($uri);
