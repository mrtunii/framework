<?php

namespace App\Controllers;

/**
 *  Test Posts Controller
 * @author Otto Mamestsarashvili
 *
 * PHP version 7.1
 *
 */

class Posts extends  \Core\BaseController
{

    /**
     * Show the index page
     *
     *
     * @return void
     */
    public function indexAction()
    {
        echo 'hello world';
        echo "<p> Parameters <pre>" .
            htmlspecialchars(print_r($this->route_params  , true)) .
            "</pre></p>";
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNewAction()
    {
        echo 'here you can add post';
    }
}