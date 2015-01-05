<?php

namespace system\core;

abstract class Widget
{
	abstract public function run();
    
    public function init()
    {
        
    }
    
    public static function render(array $options = array())
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
