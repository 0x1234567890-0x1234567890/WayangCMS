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
        print_r(explode('/', trim(str_replace($this->basePath, '', $this->uri), '/')));
    }
}