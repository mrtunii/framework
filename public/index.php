<?php 

/**
*   Front Controller
*   
*   PHP version 7.1
*/


/**
 *
 * Routing
 *
 */

require '../Core/Router.php';

$router = new Router();

$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('posts', ['controller' => 'Post', 'action' => 'index']);
$router->add('posts/new', ['controller' => 'Post', 'action' => 'new']);


$url = $_SERVER['QUERY_STRING'];

if($router->match($url)) {
    echo '<pre>';
    var_dump($router->getParams());
    echo '</pre>';

} else {
    echo '404 Bitch';
}