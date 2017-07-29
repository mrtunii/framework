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

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Post', 'action' => 'index']);
$router->add('{controller}/{action}');
//$router->add('posts/new', ['controller' => 'Post', 'action' => 'new']);
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');



$router->dispatch($_SERVER['QUERY_STRING']);