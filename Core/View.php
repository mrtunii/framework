<?php

namespace Core;

/**
 * Class View
 * The View Engine
 *
 * @author Otto Mamestsarashvili
 *
 * @package Core
 */

class View
{
    public function render($view)
    {
        $file = "../App/Views/$view";

        if(is_readable($file)) {
            require  $file;
        } else {
            echo "$file Not Found";
        }
    }
}