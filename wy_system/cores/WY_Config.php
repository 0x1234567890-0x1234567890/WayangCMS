<?php

class WY_Config
{
    private static $config_items = array();
    
    public static function load($config_path)
    {
        self::$config_items = include $config_path;
    }
    
    public static function set($key, $value)
    {
        self::$config_items[$key] = $value;
    }
    
    public static function get($key, $default = null)
    {
        if(isset(self::$config_items[$key])){
            return self::$config_items[$key];
        }
        return $default;
    }
    
    public static function has($key)
    {
         if(isset(self::$config_items[$key])){
            return true;
        }
        return false;
    }
}