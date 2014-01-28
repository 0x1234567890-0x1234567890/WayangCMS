<?php

class WY_Bootstrap {
	
	protected $router;
    protected $container;
    
    public function initRouter(){
        $routeCollections = require_once 'wy_files/confs/routes.php';
        $this->router = new AltoRouter($routeCollections, dirname($_SERVER['SCRIPT_NAME']));
    }
    
    public function initContainer(){
        $appConfig = require_once 'wy_files/confs/app.php';
        $this->container = new WY_Container($appConfig);
    }
    
    public function initComponents(){
        $this->container['db_conn'] = $this->container->share(function ($c) {
            return new WY_Database($c['db']['dsn'], $c['db']['username'], $c['db']['password']);
        });
        
        $this->container['router'] = $this->router;
    }
    
    public function run(){
        $this->initRouter();
        $this->initContainer();
        $this->initComponents();
        
        $matchRoute = $this->container['router']->match();
        
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
            
            $theController = new $controllerName($moduleName, $this->container);
            
            call_user_func_array(array($theController, $actionName), $matchRoute['params']);
        }else{
            require 'wy_files/views/404.html';
        }
    }
}