<?php

namespace App\Controllers;

/**
 * Class Home
 * @author Otto Mamestsarashvili
 * @package App\Controllers
 */

use Core\BaseController as Controller;
use Core\View;

class HomeController extends Controller
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
        View::render('Home/index.html.twig', [
            'name' => 'otto',
            'skills' => [
              'gaming',
              'programming'
            ]
        ]);
    }

}