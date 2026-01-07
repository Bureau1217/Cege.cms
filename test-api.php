<?php

require __DIR__ . '/kirby/bootstrap.php';

$kirby = new Kirby\Cms\App([
    'roots' => [
        'index' => __DIR__
    ]
]);

echo "Plugins loaded:\n";
print_r(array_keys($kirby->plugins()));

echo "\n\nAPI routes:\n";
$api = $kirby->api();
if ($api) {
    print_r($api->routes());
}
