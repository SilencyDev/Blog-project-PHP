<?php

namespace API;

require __DIR__ . '/vendor/autoload.php';

use API\Lib\Blog\Routing\Router;

$router = new Router();
$router->routerRequest();