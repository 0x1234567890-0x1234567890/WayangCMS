<?php

namespace system\core;

class Router
{
	protected $url;
    protected $basePath;
    protected $ext;
    protected $controller;
    protected $action;
    protected $routes = array();
    
    public function dispatch()
    {
        $url = str_replace($this->basePath, "", $this->url);
        $url = $url == '/' ? '/' : rtrim($url, '/');
        $parameters = array();
        $controller = 'index';
        $action = 'index';
        
        foreach($this->routes as $route){
            $matches = $route->matches($url);
            if($matches){
                $controller = $route->controller;
                $action = $route->action;
                $parameters = $route->parameters;
                
                $this->pass($controller, $action, $parameters);
                return;
            }
        }
        
        $parts = explode('/', trim($url, '/'));
        
        if(count($parts) > 0){
            $controller = $parts[0];
            
            if(count($parts) >= 2){
                $action = $parts[1];
                $parameters = array_slice($parts, -2);
            }
        }
        
        $this->pass($controller, $action, $parameters);
    }
    
    public function pass($controller, $action, $parameters = array())
    {
        $this->controller = $controller;
        $this->action = $action;
        
        try{
            $instance = new $controller();
        }
        catch(\Exception $e){
            throw new \Exception("Controller not found");
        }
        
        if(!method_exists($instance, $action)){
            throw new \Exception('Action not found');
        }
        
        call_user_func_array(array($instance,$action), is_array($parameters) ? $parameters : array());
    }
}
