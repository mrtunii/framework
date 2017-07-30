<?php

namespace App\Controllers;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use App\Models\Post;
use Core\View;

/**
 *  Test Posts Controller
 * @author Otto Mamestsarashvili
 *
 * PHP version 7.1
 *
 */

class PostsController extends  \Core\BaseController
{

    /**
     * Show the index page
     *
     *
     * @return void
     */
    public function indexAction()
    {
       $posts = Post::all();
       View::render('post.show',[
          'posts' => $posts
       ]);
    }

}