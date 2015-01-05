<?php

namespace system\core;

abstract class Widget
{
	abstract public function run();
    
    public function init()
    {
        
    }
    
    
    public function render($view, $params = array())
    {
        $obj = new View();
        
        $viewFile = $this->getViewFile($view);
        
        return $obj->render($viewFile, $params, false);
    }
    
    protected function getViewFile($view, $layout = false)
    {
        $controller = Registry::getController();
        
        $module = $controller->module;
        
        return BASEPATH . DIRECTORY_SEPARATOR . $module . DIRECTORY_SEPARATOR . 'components' .DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $view . '.php';
    }
    
    public static function widget(array $options = array())
    {
        $instance = new static();
        
        $instance->init();
        
        if (!empty($options)) {
            foreach ($options as $key => $value) {
                $instance->$key = $value;
            }
        }
        
        return $instance->run();
    }
}
