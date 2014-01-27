<?php
define('BASEPATH', __DIR__);
define('DEBUG', TRUE);

require_once 'wy_files/confs/autoload.php';
$appConfig = require_once 'wy_files/confs/app.php';
$routeCollections = require_once 'wy_files/confs/routes.php';

$altoRouter = new AltoRouter($routeCollections, dirname($_SERVER['SCRIPT_NAME']));

$theContainer = new Container($appConfig);

$theContainer['db_conn'] = $theContainer->share(function ($c) {
    return new Database($c['db']['dsn'], $c['db']['username'], $c['db']['password']);
});

$matchRoute = $altoRouter->match();

$theContainer['router'] = $altoRouter;

if($matchRoute['target'] !== NULL){
    $target = explode(':', $matchRoute['target']);
    if(count($target) >= 3){
        $moduleName = $target[0];
        $controllerName = ucfirst($target[1]).'Controller';
        $actionName = $target[2];
    }else{
        $moduleName = '';
        $controllerName = ucfirst($target[0]).'Controller';
        $actionName = $target[1];
    }
    
    if(file_exists("wy_files/controllers/{$controllerName}.php")){
        require "wy_files/controllers/{$controllerName}.php";
    }else{
        require 'wy_files/views/404.html';
        exit();
    }
    
    $theController = new $controllerName($moduleName, $theContainer);
    
    call_user_func_array(array($theController, $actionName), $matchRoute['params']);
}else{
	require 'wy_files/views/404.html';
}