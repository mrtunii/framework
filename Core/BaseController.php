<?php

namespace Core;

/**
 * Base Controller Class
 *
 * @author Otto Mamestsarashvili
 *
 * PHP version 7.1
 */

abstract class BaseController
{

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

    public function __call($name, $arguments)
    {
        $method = $name .'Action';

        if(method_exists($this,$method)) {
            if($this->before() !== false) {
                call_user_func_array([$this,$method],$arguments);
                $this->after();
            }
        } else {
            echo "Method $method not found in Controller ". get_class($this);
        }
    }

    /**
     * Execute before method call
     *
     * @return void
     */
    public function before()
    {

    }

    /**
     * Execute after method call
     *
     * @return void
     */
    public function after()
    {

    }

}


