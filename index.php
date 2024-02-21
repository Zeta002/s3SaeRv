<?php

namespace App;
require './vendor/autoload.php';

use App\src\Controller\Controller;
use App\src\Router\Router;

$url = $_GET['url'] ?? '/';

/**
 * @var Router $router
 */
$router = new Router($url);

/**
 * Route for the home page.
 */
$router->get(/**
 * @return void
 */ '/', function () {
    /**
     * @var Controller $controller
     */
    $controller = new Controller();
    $controller->render("Homepage", "Homepage.php", ["main.css", "navbar.css"]);
});

/**
 * Route for the 'about' page.
 */
$router->get(/**
 * @return void
 */ '/about', function () {
    /**
     * @var Controller $controller
     */
    $controller = new Controller();
    $controller->render("About", "About.php", ["main.css", "navbar.css"]);
});

/**
 * Route for the 'credit' page.
 */
$router->get(/**
 * @return void
 */ '/credit', function () {
    /**
     * @var Controller $controller
     */
    $controller = new Controller();
    $controller->render("Credit", "Credit.php", ["main.css", "navbar.css"]);
});

/**
 * Route for the 'howtoplay' page.
 */
$router->get(/**
 * @return void
 */ '/howtoplay', function () {
    /**
     * @var Controller $controller
     */
    $controller = new Controller();
    $controller->render("How to play", "Howtoplay.php", ["main.css", "navbar.css", "howtoplay.css"]);
});

/**
 * Route for the 'game' page.
 */
$router->get(/**
 * @return void
 */ '/game', function () {
    /**
     * @var Controller $controller
     */
    $controller = new Controller();
    $controller->renderIframe("Game", ["main.css", "navbar.css"]);
});

$router->run();