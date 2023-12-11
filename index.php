<?php

use App\src\Controller\Error404Controller;
use App\src\Controller\HomepageController;
use App\src\Router\Router;

$router = new Router($_GET['url']);

    $router->get('/', function () {
        (new HomepageController)->render();
    });
    $router->get('/error', function () {
        (new Error404Controller())->render();
    });

    $router->run();
