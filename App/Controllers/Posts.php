<?php

/**
 *  Test Posts Controller
 * @author Otto Mamestsarashvili
 *
 * PHP version 7.1
 *
 */

class Posts {

    /**
     * Show the index page
     *
     *
     * @return void
     */
    public function index()
    {
        echo 'hello from index ';
    }

    /**
     * Show the add new page
     *
     * @return void
     */
    public function addNew()
    {
        echo 'here you can add post';
    }
}