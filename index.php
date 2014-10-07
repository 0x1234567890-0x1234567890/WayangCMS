<?php

define('BASEPATH', __DIR__);
define('DEBUG', TRUE);

set_error_handler(function ($errno, $errstr, $errfile, $errline ,array $errcontex){
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});

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

    $registry = new system\core\Registry();
    
    $config = new system\core\Config();
    
    $config->load('config/config.php');

    $registry['config'] = $config;
    
    $database = new system\core\Database(array('registry'=>$registry));

    $registry['db'] = $database;
    
    $session = new system\core\Session(array(
        'type'=>'file'
    ));
    
    $registry['session'] = $session->init();
    
    $router = new system\core\Router(array(
        'url' => $_SERVER['REQUEST_URI'],
        'basePath' => dirname($_SERVER['SCRIPT_NAME'])
    ));
    
    $registry['router'] = $router;
    
    require 'config/routes.php';
    
    $router->dispatch();
    
    unset($config);
    unset($database);
    unset($session);
    unset($router);
    unset($register);
    
}catch(Exception $e){
    header("Content-type: text/html");
	include('application/views/error/500.php');
    exit;
}