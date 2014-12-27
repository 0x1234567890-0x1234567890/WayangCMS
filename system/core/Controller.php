<?php

namespace system\core;

/**
 * Kelas ini berfungsi sebagai base controller
 * 
 */
abstract class Controller
{
    public $id;
    public $layout = 'main';
    public $module;
    
    public function __construct($id, $module, $action)
    {
        $this->id = $id;
        $this->module = $module;
        $this->action = $action;
    }
    
    public function render($view, $params = array(), $print = true)
    {
        $obj = new View();
        
        $viewFile = $this->getViewFile($view);
        
        $content = $obj->render($viewFile, $params);
        
        if (is_string($this->layout)) {
            $layoutFile = $this->getViewFile($this->layout, true);
        
            return $obj->render($layoutFile, array('content' => $content));
        }
        
        return $content;
    }
    
    public function redirect($url, $status = 302)
    {
        Registry::getResponse()->redirect($url, $status);
    }
    
    public function getViewFile($view, $layout = false)
    {
        $dir = 'layouts';
        
        if (!$layout) {
            $dir = $this->id
        }
        
        return BASEPATH . $this->module . DIRECTORY_SEPARATOR . 'views' .DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $view . '.php';
    }
    
    public function __get($key, $value)
    {
        $getter = 'get' . ucfirst($key);
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
        
        return null;
    }
}