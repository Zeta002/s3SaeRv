<?php

    namespace App\src\Router;

    use App\src\Controller\Error404Controller;


    class Router
    {
        private $url;
        private $routes = [];

        public function __construct($url)
        {
            $this->url = $url;
        }

        public function get($path, $callable)
        {
            $route = new Route($path, $callable);
            $this->routes['GET'][] = $route;
        }

        public function post($path, $callable)
        {
            $route = new Route($path, $callable);
            $this->routes['POST'][] = $route;
        }

        public function run()
        {
            if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
                (new Error404Controller())->render();
                exit();
            }
            foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
                if ($route->match($this->url)) {
                    return $route->call();
                }
            }
            (new Error404Controller())->render();
            exit();
        }
    }