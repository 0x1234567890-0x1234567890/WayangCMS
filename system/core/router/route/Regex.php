<?php

namespace wayang\router\route;

use wayang\router as router;

class Regex extends router\Route
{
	protected $keys;
    
    public function matches($url)
    {
        $pattern = $this->pattern;
        
        preg_match_all("#^{$pattern}$#", $url, $values);
        
        if(count($values) && count($values[0]) && count($values[1])){
            $derived = array_combine($this->keys, $values[1]);
            $this->parameters = array_merge($this->parameters, $derived);
            
            return true;
        }
        
        return false;
    }
}
