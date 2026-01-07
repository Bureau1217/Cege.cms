<?php

// Active CORS pour permettre les requêtes depuis le front-end
header("Access-Control-Allow-Origin: *");

return [
    'debug' => true,

    // Configuration de l'API Kirby
    'api' => [
        'basicAuth' => true,
        'allowInsecure' => true, // Permettre en local (à désactiver en production HTTPS)
    ],

    // Configuration KQL (Kirby Query Language)
    'kql' => [
        'auth' => false // Permet les requêtes KQL sans authentification supplémentaire
    ],

    // Configuration des avis Google
    'google' => [
        'places_api_key' => '', // Ajoutez votre clé API Google Places ici
        'place_id' => '',       // Ajoutez votre Place ID ici
    ],

    // Configuration du site
    'languages' => true,
    'cache' => [
        'pages' => [
            'active' => true,
            'ignore' => function ($page) {
                return $page->isHomePage();
            }
        ]
    ]
];
