<?php

/**
 * Kelas ini berfungsi sebagai inisialisasi awal framework
 * 
 */
class Bootstrap
{
    /**
     * Inisialisasi routing engine
     * 
     */
    public function initRouter()
    {
        $routeCollections = include('wy_config/routes.php');
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        if(in_array($basePath, array('/', '\\'))){
            $basePath = '';
        }
        $router = new AltoRouter($routeCollections, $basePath);
        WY_Registry::set('router', $router);
    }
    
    /**
     * Inisialisasi konfigurasi inti sistem
     * 
     */
    public function initConfiguration()
    {
        if(!WY_Config::load('wy_config/config.php')){
            $this->runInstaller();
            exit();
        }
        date_default_timezone_set(WY_Config::get('timezone') ? WY_Config::get('timezone') : 'Asia/Jakarta');
    }
    
    public function runController($cName, $aName, $params)
    {
        $theController = new $cName();
        $reflection_object = new ReflectionObject($theController);
        if($reflection_object->hasMethod('before_action')){
            $reflection_object->getMethod('before_action')->invoke($theController);
        }
        call_user_func_array(array($theController, $aName), $params);
        if($reflection_object->hasMethod('after_action')){
            $reflection_object->getMethod('after_action')->invoke($theController);
        }
    }
    
    /**
     * Eksekusi program di mulai disini
     * 
     */
    public function run()
    {
        $this->initRouter();
        
        $matchRoute = WY_Registry::get('router')->match();
        
        $this->initConfiguration();
        
        if($matchRoute['target'] !== null){
            array_walk($matchRoute['params'], function(&$item, $key){
                $item = rtrim($item, '/');
            });
            
            $target = explode(':', $matchRoute['target']);
            $moduleName = $target[0];
            $controllerName = ucfirst($target[1]).'Controller';
            $actionName = $target[2];
            $controllerPath = preg_replace("~//~", "/", "wy_app/controllers/{$moduleName}/{$controllerName}.php");
            if(file_exists($controllerPath)){
                require $controllerPath;
            }else{
                require 'wy_app/views/404.php';
                exit();
            }
            $this->runController($controllerName, $actionName, $matchRoute['params']);
        }else{
            require 'wy_app/views/404.php';
        }
    }
    
    public function runInstaller()
    {
        require 'wy_app/controllers/InstallController.php';
        $this->runController('InstallController', 'index', array());
    }
}