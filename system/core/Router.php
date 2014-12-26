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
        
        echo "<pre>";
        print_r($parts);
        echo "</pre>";
        
        $activeModules = Config::get('modules');
        
        if ($partsCount == 1) {
            if (in_array($parts[0], $activeModules)) {
                
            }
        }
    }
}