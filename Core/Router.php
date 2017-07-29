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
     * Dispach the route
     * execute controller function
     *
     *
     * @param $url
     */
    public function dispatch($url)
    {
        if($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);

            if(class_exists($controller)) {
                $controller_object = new $controller();

                $action = $this->params['action'];
                $action = $this->convertToCamelCase($action);

                if(is_callable([$controller_object,$action])) {
                    $controller_object->$action();
                } else {
                    echo "Method $action (in controller $controller) not found !";
                }
            } else {
                echo "Controller class $controller not found !";
            }
        } else {
            echo '404 Bitch';
        }
    }

    /**
     * Convert the string with hyphens to StudlyCaps
     * e.g post-authors => PostAuthors
     *
     * @param $string
     * @return mixed
     */
    public function convertToStudlyCaps($string)
    {
        return str_replace(' ','',ucwords(str_replace('-',' ',$string)));
    }

    /**
     * Convert the string with hyphens to camelCase
     * e.g post-author => postAuthor
     *
     * @param $string
     * @return string
     */
    public function convertToCamelCase($string)
    {
        return lcfirst($this->convertToStudlyCaps($string));
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