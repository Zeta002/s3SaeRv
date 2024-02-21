<?php

namespace App\src\Router;

/**
 * Route class to handle individual routes in the application.
 */
class Route
{
    private $path;
    private $callable;
    private $matches;

    /**
     * Route class constructor.
     *
     * @param string $path The path of the route.
     * @param callable $callable The function to call when the route is matched.
     */
    public function __construct($path, $callable)
    {
        $this->path = trim($path, '/');
        $this->callable = $callable;
    }

    /**
     * Checks if a given URL matches the route's path.
     *
     * @param string $url The URL to check.
     * @return bool Returns true if the URL matches the route's path, false otherwise.
     */
    public function match($url)
    {
        $url = trim($url, '/');
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $regex = "#^$path$#i";
        if (!preg_match($regex, $url, $matches)) {
            return false;
        }
        array_shift($matches);
        $this->matches = $matches;
        return true;
    }

    /**
     * Calls the callable function associated with the route.
     *
     * @return mixed The result of the callable function.
     */
    public function call()
    {
        return call_user_func_array($this->callable, $this->matches);
    }
}