<?php

define('BASEPATH', __DIR__);
define('DEBUG', TRUE);

function base_url()
{
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https://' : 'http://';
    $path = $_SERVER['PHP_SELF'];
    $path_parts = pathinfo($path);
    $directory = $path_parts['dirname'];
    $directory = ($directory == "/") ? "" : $directory;
    $host = $_SERVER['HTTP_HOST'];
    return $protocol . $host . $directory;
}

try{
	require 'system/core/Core.php';
    
    system\core\Core::init();
    
    system\core\Config::load('config/config.php');
    
    system\core\Registry::set('database', new system\core\Database());
    
    $session = new system\core\Session(array('type'=>'file'));
    
    system\core\Registry::set('session', $session->init());
    
    $router = new system\core\Router(array('url' => $_SERVER['REQUEST_URI'], 'basePath' => dirname($_SERVER['SCRIPT_NAME'])));
    
    system\core\Registry::set('router', $router);
    
    require 'config/routes.php';
    
    $router->dispatch();
    
    unset($session);
    unset($router);
    
}catch(Exception $e){
    header("Content-type: text/html");
	include('application/views/error/500.php');
    exit;
}