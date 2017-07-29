<?php

/**
 *  Router
 * @author Otto Mamestsarashvili
 *  PHP version 7.1
 */

class Router
{

    /**
     * Array of routes (the routing table)
     * @var array
     */
    protected $routes = [];

    /**
     * Array of parameters
     * @var array
     */
    protected $params = [];

    /**
     * Add route to routing table
     * @param $route *The route URL
     * @param $params *parameters (controller,action, etc)
     */
    public function add($route, $params = [])
    {

        //Convert the route to regular expression: escape forward slashes
        $route = preg_replace('/\//', '\\/', $route);

        // Convert variables e.g {controller}
        $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);

        $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)',$route);

        // Add start and end delimiters, add case insensitive flag
        $route = '/^' . $route . '$/i';

        $this->routes[$route] = $params;
    }

    /**
     * Match the route to the routes in routing table, setting the params property
     * if a route is found
     *
     * @param $url
     * @return bool
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {

            if (preg_match($route, $url, $matches)) {
                foreach ($matches as $key => $match) {
                    if (is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /**
     * Get all parameters
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * Get all routes from routing table
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}