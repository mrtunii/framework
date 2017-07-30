<?php

namespace App\Controllers;

/**
 * Class Home
 * @author Otto Mamestsarashvili
 * @package App\Controllers
 */

class Home extends \Core\BaseController
{
    /**
     * Before filter
     */
    public function before()
    {
        echo '(before)';
    }
    public function indexAction()
    {
        echo 'hello from home controller';
    }

}