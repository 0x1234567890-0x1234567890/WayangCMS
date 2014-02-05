<?php

class WY_Bootstrap {
    
    public function initRouter(){
        $configuration = WY_Registry::get('configuration');
        $parsed = $configuration->parse("wy_files/confs/routes");
        
        $routeCollections = get_object_vars($parsed->route);
        
        array_walk($routeCollections, function(&$item, $key){
            $item = explode(' ', $item);
        });
        
        $basePath = dirname($_SERVER['SCRIPT_NAME']);
        if(in_array($basePath, array('/', '\\'))){
            $basePath = '';
        }
        
        $router = new AltoRouter($routeCollections, $basePath);
        WY_Registry::set('router', $router);
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
                $moduleName = 'wy_files';
                $controllerName = ucfirst($target[0]).'Controller';
                $actionName = $target[1];
            }
            
            if(file_exists("{$moduleName}/controllers/{$controllerName}.php")){
                require "{$moduleName}/controllers/{$controllerName}.php";
            }else{
                require 'wy_files/shared/views/404.html';
                exit();
            }
            
            $theController = new $controllerName($moduleName);
            
            call_user_func_array(array($theController, $actionName), $matchRoute['params']);
        }else{
            require 'wy_files/shared/views/404.html';
        }
    }
}