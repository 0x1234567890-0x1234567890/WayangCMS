<?php

define('BASEPATH', __DIR__);
define('DEBUG', TRUE);

try{
	require 'system/core/Core.php';
    
    system\core\Core::init();
    
    system\core\Config::load('config/config.php');
    
    system\core\Registry::set('db', new system\core\Database());
    
    system\core\Session::start();
    
    system\core\Registry::set('router', new system\core\Router());
    
    system\core\Registry::get('router')->dispatch();
    
}catch(Exception $e){
    header("Content-type: text/html");
	include('application/views/error/500.php');
    exit;
}