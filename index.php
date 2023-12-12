<?php

namespace App;
require './vendor/autoload.php';

use App\src\Controller\PagesController\Error404Controller;
use App\src\Controller\PagesController\HomepageController;
use App\src\Router\Router;

$url = $_GET['url'] ?? '/';

$router = new Router($url);

$router->get('/', function () {
    (new HomepageController)->render();
});
$router->get('/error', function () {
    (new Error404Controller())->render();
});

$router->run();