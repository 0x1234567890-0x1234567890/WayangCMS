<?php

class WY_Bootstrap {
	
	protected $router;
    
    public function initRouter(){
        $routeCollections = require_once 'wy_files/confs/routes.php';
        $this->router = new AltoRouter($routeCollections, dirname($_SERVER['SCRIPT_NAME']));
        WY_Registry::set('router', $this->router);
    }
    
    public function initConfiguration(){
        $configuration = new WY_Configuration('ini');
        $configuration = $configuration->initialize();
        WY_Registry::set('configuration', $configuration);
    }
    
    public function initDatabase(){
        $configuration = WY_Registry::get('configuration');
        $parsed = $configuration->parse("wy_files/confs/app");
        
        $type = $parsed->database->default->type;
        
        unset($parsed->database->default->type);
        
        $options = (array) $parsed->database->default;
        
        $database = new WY_Database($type, $options);
        
        $database = $database->initialize();
        
        WY_Registry::set('database', $database);
    }
    
    public function run(){
        $this->initConfiguration();
        $this->initRouter();
        $this->initDatabase();
        
        $matchRoute = WY_Registry::get('router')->match();
        
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
            
            $theController = new $controllerName($moduleName);
            
            call_user_func_array(array($theController, $actionName), $matchRoute['params']);
        }else{
            require 'wy_files/views/404.html';
        }
    }
}