<?php

require __DIR__ . '/vendor/autoload.php';

// Charger les variables d'environnement depuis .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'kirby/bootstrap.php';

echo (new Kirby)->render();
