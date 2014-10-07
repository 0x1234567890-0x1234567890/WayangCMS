<?php

namespace system\core\router\route;

use system\core\router as router;

class Standard extends router\Route
{
	public function matches($url)
    {
        $pattern = $this->pattern;
        
        preg_match_all("#:([a-zA-Z0-9]+)#", $pattern, $keys);
        
        if(count($keys) && count($keys[0]) && count($keys[1])){
            $keys = $keys[1];
        }else{
            return preg_match("#^{$pattern}$#", $url);
        }
        
        $pattern = preg_replace("#:([a-zA-Z0-9]+)#", "([a-zA-Z0-9-_]+)", $pattern);
        
        preg_match_all("#^{$pattern}$#", $url, $values);
        
        if(count($values) && count($values[0]) && count($values[1])){
            unset($values[0]);
            
            $flatten = function($array, $return = array()) use(&$flatten){
                foreach($array as $key => $value){
                    if(is_array($value) || is_object($value)){
                        $return = $flatten($value, $return);
                    }else{
                        $return[] = $value;
                    }
                }
                
                return $return;
            };
            
            $derived = array_combine($keys, $values);
            $this->parameters = array_merge($this->parameters, $flatten($derived));
            
            return true;
        }
        
        return false;
    }
}
