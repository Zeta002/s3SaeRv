<?php

namespace App;
require './vendor/autoload.php';

use App\src\Controller\PagesController\AboutController;
use App\src\Controller\PagesController\CreditController;
use App\src\Controller\PagesController\Error404Controller;
use App\src\Controller\PagesController\HomepageController;
use App\src\Controller\PagesController\HowtoplayController;
use App\src\Router\Router;

$url = $_GET['url'] ?? '/';

$router = new Router($url);

$router->get('/', function () {
    (new HomepageController)->render();
});

$router->get('/about', function () {
    (new AboutController())->render();
});

$router->get('/credit', function () {
    (new CreditController())->render();
});

$router->get('/howtoplay', function () {
    (new HowtoplayController())->render();
});

$router->get('/error', function () {
    (new Error404Controller())->render();
});

$router->run();