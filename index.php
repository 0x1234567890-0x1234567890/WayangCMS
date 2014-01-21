<?php

require_once 'wy_files/libs/AltoRouter.php';

$routeCollections = require_once 'wy_files/confs/routes.php';

$altoRouter = new AltoRouter($routeCollections, '/Wy/WayangCMS');

$matchRoute = $altoRouter->match();

if($matchRoute['target'] !== NULL){
	//$moduleName = $matchRoute['target']['m'];
    $controllerName = $matchRoute['target']['c'];
    $actionName = $matchRoute['target']['a'];
    
    require_once "wy_files/controllers/{$controllerName}.php";
    
    $theController = new $controllerName();
    //$theController->setModule($moduleName);
    //$theController->setContainer($pimpleContainer);
    
    call_user_func_array(array($theController, $actionName), $matchRoute['params']);
}else{
	require 'wy_files/views/404.html';
}