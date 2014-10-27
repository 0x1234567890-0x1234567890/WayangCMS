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
        $getter = 'get'.ucfirst($name);
        
        if(method_exists($this, $getter)){
            return $this->$getter();
        }else{
            throw new \Exception('Private property cannot accessed directly');
        }
    }
}
