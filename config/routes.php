<?php

$routes = array(
    array(
        'pattern'=>'/',
        'controller'=>'application\controllers\Home',
        'action'=>'index'
    ),
    array(
        'pattern'=>'/post/:permalink',
        'controller'=>'application\controllers\Post',
        'action'=>'index'
    ),
);

foreach ($routes as $route){
    $router->addRoute(new system\core\router\route\Standard($route));
}

unset($routes);