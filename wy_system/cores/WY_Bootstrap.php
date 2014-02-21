<?php

/**
 * Kelas ini berfungsi sebagai inisialisasi awal framework
 * 
 */
class WY_Bootstrap
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
        WY_Config::load('wy_config/config.php');
        date_default_timezone_set(WY_Config::get('timezone'));
    }
    
    /**
     * Eksekusi program di mulai disini
     * 
     */
    public function run()
    {
        $this->initConfiguration();
        $this->initRouter();
        
        $matchRoute = WY_Registry::get('router')->match();
        
        if($matchRoute['target'] !== null){
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
            $theController = new $controllerName();
            $reflection_object = new ReflectionObject($theController);
            if($reflection_object->hasMethod('before_action')){
                $reflection_object->getMethod('before_action')->invoke($theController);
            }
            call_user_func_array(array($theController, $actionName), $matchRoute['params']);
            if($reflection_object->hasMethod('after_action')){
                $reflection_object->getMethod('after_action')->invoke($theController);
            }
        }else{
            require 'wy_app/views/404.php';
        }
    }
}