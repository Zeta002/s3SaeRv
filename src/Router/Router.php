<?php

namespace App\src\Router;

use App\src\Controller\Controller;

/**
 * Router class to handle routing in the application.
 */
class Router
{
    private $url;
    private $routes = [];

    /**
     * Router class constructor.
     *
     * @param string $url The current URL.
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Adds a GET route to the list of routes.
     *
     * @param string $path The path of the route.
     * @param callable $callable The function to call when the route is matched.
     */
    public function get($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['GET'][] = $route;
    }

    /**
     * Adds a POST route to the list of routes.
     *
     * @param string $path The path of the route.
     * @param callable $callable The function to call when the route is matched.
     */
    public function post($path, $callable)
    {
        $route = new Route($path, $callable);
        $this->routes['POST'][] = $route;
    }

    /**
     * Executes the route that matches the current URL.
     */
    public function run()
    {
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            (new Controller())->renderRaw();
            exit();
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        (new Controller())->renderRaw();
        exit();
    }
}