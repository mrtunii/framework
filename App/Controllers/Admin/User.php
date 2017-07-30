<?php

namespace App\Controllers\Admin;

/**
 * Class User
 *
 * @author Otto Mamestsarashvili
 * @package App\Controllers\Admin
 */

class User extends \Core\BaseController
{
    /**
     * Before filter
     */
    public function before()
    {
        // Here u can check if user has admin privileges
        // return false;
    }

    /**
     * Index Page
     */
    public function indexAction()
    {
        echo 'Hello To admin panel';
    }
}