<?php

namespace App\Controllers;

use App\Models\Posts;
use Core\BaseController;
use Core\View;

/**
 *  Test Posts Controller
 * @author Otto Mamestsarashvili
 *
 * PHP version 7.1
 *
 */
class PostsController extends  BaseController
{

    /**
     * Show the index page
     *
     *
     * @return void
     */
    public function indexAction()
    {
       $posts = Posts::all();

       View::render('post.show',[
          'posts' => $posts
       ]);
    }


    public function showAction($id)
    {
       $post = Posts::find($id);

       var_dump($post);
       die;
    }

}