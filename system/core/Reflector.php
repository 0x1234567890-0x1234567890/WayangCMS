<?php

namespace system\core;

class Reflector
{
	protected $_class;
    protected $meta = array(
        'class' => array(),
        'properties' => array(),
        'methods' => array()
    );
    
    public function __construct($class)
    {
        $this->_class = $class;
    }
    
    protected function _getClassComment()
    {
        $reflection = new \ReflectionClass($this->_class);
        return $reflection->getDocComment();
    }
    
    protected function _getClassProperties()
    {
        $reflection = new \ReflectionClass($this->_class);
        return $reflection->getProperties();
    }
    
    protected function _getClassMethods()
    {
        $reflection = new \ReflectionClass($this->_class);
        return $reflection->getMethods();
    }
    
    protected function _getPropertyComment($property)
    {
        $reflection = new \ReflectionProperty($this->_class, $property);
        return $reflection->getDocComment();
    }
    
    protected function _getMethodComment($method)
    {
        $reflection = new \ReflectionProperty($this->_class, $method);
        return $reflection->getDocComment();
    }
    
    protected function parse($comment)
    {
        $meta = array();
        $pattern = "(@[a-zA-Z]+\s*[a-zA-Z0-9, ()_]*)";
        
        $match_func = function($string, $pattern){
            preg_match_all('#'.$pattern.'#', $string, $matches, PREG_PATTERN_ORDER);
            
            if (!empty($matches[1]))
            {
                return $matches[1];
            }
            
            if (!empty($matches[0]))
            {
                return $matches[0];
            }
            
            return null;
        };
        
        $clean_func = function($array){
            return array_filter($array, function($item) {
                return !empty($item);
            });
        };
        
        $trim_func = function($array){
            return array_map(function($item) {
                return trim($item);
            }, $array);
        };
        
        $split_func = function($string, $pattern, $limit = null)
        {
            $flags = PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE;
            return preg_split('#'.$pattern.'#', $string, $limit, $flags);
        };
        
        $matches = $match_func($comment, $pattern);
        
        if($matches != null){
            foreach($matches as $match){
                $parts = $clean_func($trim_func($split_func($match, "[\s]", 2)));
                $meta[$parts[0]] = true;
                if(count($parts) > 1){
                    $meta[$parts[0]] = $clean_func($trim_func($split_func($parts[1], '', '')));
                }
            }
        }
        
        return $meta;
    }
    
    public function getClassMeta()
    {
        $comment = $this->_getClassComment();
        if(!empty($comment)){
            $this->meta['class'] = $this->parse($comment);
        }else{
            $this->meta['class'] = null;
        }
        
        return $this->meta['class'];
    }
    
    public function getClassProperties()
    {
        $properties = $this->_getClassProperties();
        foreach($properties as $property){
            $_properties[] = $property->getName();
        }
        
        return $_properties;
    }
    
    public function getClassMethods()
    {
        $methods = $this->_getClassMethods();
        foreach($methods as $method){
            $_methods[] = $method->getName();
        }

        return $_methods;
    }
    
    public function getPropertyMeta($property)
    {
        if(!isset($this->meta['properties'][$property])){
            $comment = $this->_getPropertyComment($property);
            if(!empty($comment)){
                $this->meta['properties'][$property] = $this->parse($comment);
            }else{
                $this->meta['properties'][$property] = null;
            }
        }
        
        return $this->meta['properties'][$property];
    }
    
    public function getMethodMeta($method)
    {
        if(!isset($this->meta['methods'][$method])){
            $comment = $this->_getMethodComment($method);
            if(!empty($comment)){
                $this->meta['methods'][$method] = $this->parse($comment);
            }else{
                $this->meta['methods'][$method] = null;
            }
        }
        
        return $this->meta['methods'][$method];
    }
}
