<?php

namespace App;
require './vendor/autoload.php';

use App\src\Controller\Controller;
use App\src\Router\Router;

$url = $_GET['url'] ?? '/';

$router = new Router($url);

$router->get('/', function () {
    $controller = new Controller();
    $controller->render("Homepage", "Homepage.php", ["main.css", "navbar.css"]);
});

$router->get('/about', function () {
    $controller = new Controller();
    $controller->render("Homepage", "Homepage.php", ["main.css", "navbar.css"]);
});

$router->get('/credit', function () {
    $controller = new Controller();
    $controller->render("Credit", "Credit.php", ["main.css", "navbar.css"]);
});

$router->get('/howtoplay', function () {
    $controller = new Controller();
    $controller->render("How to play", "Howtoplay.php", ["main.css", "navbar.css", "howtoplay.css"]);
});

$router->get('/game', function () {
    $controller = new Controller();
    $controller->renderIframe("Jeu", ["main.css", "navbar.css"]);
});

$router->run();

