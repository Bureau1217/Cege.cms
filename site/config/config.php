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
  'hooks' => require __DIR__ . '/hooks.php'
];
