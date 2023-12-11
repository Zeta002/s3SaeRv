<?php

    require 'vendor/autoload.php';

    $router = new \App\src\Router\Router($_GET['url']);

    $router->get('/', function () {
        (new \App\src\Controller\HomepageController)->render();
    });
    $router->get('/error', function () {
        (new \App\src\Controller\Error404Controller())->render();
    });

    $router->run();
