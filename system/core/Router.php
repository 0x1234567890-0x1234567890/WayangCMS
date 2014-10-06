<?php

namespace wayang;

use wayang\Base as Base;

class Router extends Base
{
	protected $url;
    protected $ext;
    protected $controller;
    protected $action;
    protected $routes = array();
    
    public function addRoute($route)
    {
        $this->routes[] = $route;
        return $this;
    }
    
    public function removeRoute($route)
    {
        foreach($this->routes as $i => $stored){
            if($stored == $route){
                unset($this->routes[$i]);
            }
        }
        
        return $this;
    }
    
    public function getRoutes()
    {
        $list = array();
        
        foreach($this->routes as $route){
            $list[$route->pattern] = get_class($route);
        }
        
        return $list;
    }
    
    public function dispatch()
    {
        $url = $this->url;
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
        $name = ucfirst($controller);
        
        $this->controller = $controller;
        $this->action = $action;
    }
}
