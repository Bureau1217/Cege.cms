<?php

return [
  'debug' => true,
  'api' => [
    'basicAuth' => false,        // Désactive l'authentification basique en local
    'allowInsecure' => true      // Accepte HTTP en local
  ],
  'kql' => [
    'auth' => false              // KQL sans authentification en local
  ]
];
