<?php

namespace App\Controllers;

/**
 * Class Home
 * @author Otto Mamestsarashvili
 * @package App\Controllers
 */

use Core\View;

class Home extends \Core\BaseController
{
    /**
     * Before filter
     */
    public function before()
    {
//        echo '(before)';
    }
    public function indexAction()
    {
        View::render('Home/index.html', [
            'name' => 'otto'
        ]);
//        echo 'hello from home controller';
    }

}