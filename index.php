<?php

namespace App;
require './vendor/autoload.php';

use App\src\Router\Router;
use App\src\Controller\HomepageController;
use App\src\Controller\Error404Controller;

$url = $_GET['url'] ?? '/';

$router = new Router($url);

$router->get('/', function () {
    (new HomepageController)->render();
});
$router->get('/error', function () {
    (new Error404Controller())->render();
});

$router->run();