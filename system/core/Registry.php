<?php

namespace system\core;

/**
 * Kelas ini berfungsi menyimpan objek dari kelas lain dan me-manage nya
 * 
 */
class Registry
{
    private static $instances = array();
    
    private function __construct()
    {
        // no implementation
    }
    
    private function __clone()
    {
        // no implementation
    }
    
    public static function get($key, $default = null)
    {
        if(isset(self::$instances[$key])){
            return self::$instances[$key];
        }
        return $default;
    }
    
    public static function set($key, $value = null)
    {
        self::$instances[$key] = $value;
    }
    
    public static function remove($key)
    {
        unset(self::$instances[$key]);
    }
}