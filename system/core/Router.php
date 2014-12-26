<?php

namespace system\core;

class Router
{
    protected $uri;
    protected $basePath;
    
    public function __construct()
    {
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->basePath = dirname($_SERVER['SCRIPT_NAME']);
    }
    
	public function dispatch()
    {
        $url = trim(str_replace($this->basePath, '', $this->uri), '/');
        
        $parts = explode('/', $url);
        
        $partsCount = count($parts);
        
        $activeModules = array_merge(Config::get('modules'), array('admin'));
        
        $module = 'main';
        $controller = 'Home';
        $action = 'index';
        $params = array();
        
        if ($partsCount == 1) {
            if (in_array($parts[0], $activeModules)) {
                $module = $activeModules[array_search($parts[0], $activeModules)];
            } else {
                $controller = ucfirst($parts[0]);
            }
        } elseif ($partsCount == 2) {
            if (in_array($parts[0], $activeModules)) {
                $module = $activeModules[array_search($parts[0], $activeModules)];
            } else {
                $controller = ucfirst($parts[0]);
            }
            $action = $parts[1];
        } elseif ($partsCount > 2) {
            if (in_array($parts[0], $activeModules)) {
                $module = $activeModules[array_search($parts[0], $activeModules)];
                $controller = $parts[1];
                $action = $parts[2];
                $params = array_slice($parts, 3);
            } else {
                $controller = ucfirst($parts[0]);
                $action = $parts[1];
                $params = array_slice($parts, 2);
            }
        }
        
        try{
            $ns = "$module\\controllers\\$controller";
            $obj = new $ns();
            call_user_func_array(array($obj, $action), $params);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
}