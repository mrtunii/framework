<?php 

/**
*   Front Controller
*
*   @author Otto Mamestsarashvili
*
*   PHP version 7.1
*/

require '../App/Controllers/Posts.php';

/**
 *
 * Routing
 *
 */

require '../Core/Router.php';

$router = new Router();

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);