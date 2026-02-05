<?php

return [
  'debug' => true,
  'panel' => [
    'install' => false
  ],
  'api' => [
    'basicAuth' => false,
    'allowInsecure' => true
  ],
  'kql' => [
    'auth' => false,
    'intercept' => function ($type, $key, $value) {
      return true;
    }
  ],
  'hooks' => require __DIR__ . '/hooks.php',

  // SMTP (configurable via .env)
  'email' => [
    'transport' => [
      'type'       => 'smtp',
      'host'       => $_ENV['SMTP_HOST'] ?? 'mail.infomaniak.com',
      'port'       => (int) ($_ENV['SMTP_PORT'] ?? 587),
      'security'   => $_ENV['SMTP_SECURITY'] ?? 'tls',
      'auth'       => true,
      'username'   => $_ENV['SMTP_USERNAME'] ?? '',
      'password'   => $_ENV['SMTP_PASSWORD'] ?? '',
    ],
  ],

  // Contact form
  'cege.contact.to'   => $_ENV['CONTACT_TO'] ?? 'erik@cegeswiss.com',
  'cege.contact.from' => $_ENV['SMTP_USERNAME'] ?? 'noreply@cegeswiss.com',
];
