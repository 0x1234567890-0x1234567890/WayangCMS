<?php

namespace system\core;

/**
 * Kelas ini berfungsi sebagai base controller
 * 
 */
abstract class Controller
{
    public $id;
    public $layout;
    public $module;
    
    public function __construct($id, $module, $action)
    {
        $this->id = $id;
        $this->module = $module;
        $this->action = $action;
    }
    
    public function render($view, $params = array())
    {
        
    }
    
    public function redirect($url, $status = 302)
    {
        
    }
}