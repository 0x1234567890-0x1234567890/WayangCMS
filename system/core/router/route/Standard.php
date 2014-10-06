<?php

namespace wayang\router\route;

use wayang\router as router;

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
            
            $derived = array_combine($keys, $values);
            $this->parameters = array_merge($this->parameters, $derived);
            
            return true;
        }
        
        return false;
    }
}
