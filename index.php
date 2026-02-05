<?php

// CORS - Allow frontend (must be before any output)
header("Access-Control-Allow-Origin: https://cegeswiss.com");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Max-Age: 86400");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

require __DIR__ . '/vendor/autoload.php';

// Charger les variables d'environnement depuis .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'kirby/bootstrap.php';

echo (new Kirby)->render();
