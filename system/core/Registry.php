<?php

namespace wayang;

/**
 * Kelas ini berfungsi menyimpan objek dari kelas lain dan me-manage nya
 * 
 */
class Registry implements ArrayAccess
{
    protected $objects = array();
    
    /**
     * default
     * 
     */
    public function __construct(array $objects)
    {
        $this->objects = $objects;
    }
    
    /**
     * default
     * 
     */
    public function offsetSet($id, $object)
    {
        $this->objects[$id] = $object;
    }
    
    /**
     * default
     * 
     */
    public function offsetGet($id)
    {
        if(!array_key_exists($id, $this->objects)){
            throw new InvalidArgumentException(sprintf('Object with ID "%s" is not defined', $id));
        }
        
        $isFactory = is_object($this->objects[$id]) && method_exists($this->objects[$id], '__invoke');
        
        return $isFactory ? $this->objects[$id]($this) : $this->objects[$id];
    }
    
    /**
     * default
     * 
     */
    public function offsetExists($id)
    {
        return array_key_exists($id, $this->objects);
    }
    
    /**
     * default
     * 
     */
    public function offsetUnset($id)
    {
        unset($this->objects[$id]);
    }
    
    /**
     * default
     * 
     */
    public static function share(Closure $callable)
    {
        return function($c) use($callable){
            static $object;
            if(null === $object){
                $object = $callable($c);
            }
            return $object;
        };
    }
    
    /**
     * default
     * 
     */
    public function keys()
    {
        return array_keys($this->objects);
    }
}