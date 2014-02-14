<?php

class WY_Registry
{
    
    private static $instances = array();
    
    private function __construct()
    {
        
    }
    
    private function __clone()
    {
        
    }
    
    public static function get($key, $default=null)
    {
        if(isset(self::$instances[$key])){
            return self::$instances[$key];
        }
        return $default;
    }
    
    public static function set($key, $value)
    {
        self::$instances[$key] = $value;
    }
    
    public static function remove($key)
    {
        unset(self::$instances[$key]);
    }
}