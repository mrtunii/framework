<?php

/**
 *  Router
 *
 *  PHP version 7.1
 */

class Router {

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
    public function add($route,$params)
    {
        $this->routes[$route] = $params;
    }

    /**
     * Match the route to the routes in routing table, setting the params property
     * if a route is found
     * @param $url
     * @return bool
     */
    public function match($url)
    {
        foreach ($this->routes as $route => $params) {
            if($url == $route) {
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