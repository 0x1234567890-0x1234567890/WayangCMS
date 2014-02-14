<?php

class WY_Bootstrap
{
    
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
    
    public function initConfiguration()
    {
        WY_Config::load('wy_config/config.php');
        date_default_timezone_set(WY_Config::get('timezone'));
    }
    
    public function run()
    {
        $this->initConfiguration();
        $this->initRouter();
        
        $matchRoute = WY_Registry::get('router')->match();
        
        if($matchRoute['target'] !== NULL){
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
            call_user_func_array(array($theController, $actionName), $matchRoute['params']);
            if($theController instanceof WY_Controller_Template){
                $theController->render_template();
            }
        }else{
            require 'wy_app/views/404.php';
        }
    }
}