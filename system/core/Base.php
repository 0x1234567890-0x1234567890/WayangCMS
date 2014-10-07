<?php

namespace system\core;

class Base
{
	public function __construct($options = array())
    {
        if(is_array($options) || is_object($options)){
            foreach($options as $key => $value){
                $this->$key = $value;
            }
        }
    }
    
    public function __get($name)
    {
        return $this->$name;
    }
}
