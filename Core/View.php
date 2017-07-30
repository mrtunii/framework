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

    /**
     * Render template
     *
     *
     * @param $template
     * @param array $args
     */
    public static function render($template, $args = [])
    {
        static  $twig = null;
        if($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../App/Views');
            $twig = new \Twig_Environment($loader, []);
        }
        echo $twig->render($template,$args);
    }
}