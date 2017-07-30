<?php

namespace Core;

/**
 * Base Controller Class
 *
 * @author Otto Mamestsarashvili
 *
 * PHP version 7.1
 */

abstract  class BaseController {

    /**
     * Parameters of matched route
     * @var array
     */
    protected $route_params = [];

    /**
     * BaseController constructor.
     *
     *
     * @param $route_params
     */
    public function __construct($route_params)
    {
        $this->route_params = $route_params;
    }

}


