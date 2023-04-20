<?php
$router = new \core\router();

$router->get('', [new controllers\categoryController(), 'index']);
$router->get('cat', [new controllers\categoryController(), 'show']);

$router->resolve();
