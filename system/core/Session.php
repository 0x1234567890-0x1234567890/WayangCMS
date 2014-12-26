<?php

namespace system\core;

/**
 * Kelas ini berfungsi sebagai wrapper untuk session pada PHP
 * pengambilan penge-set-an session dilakukan melalui kelas ini
 */
class Session
{
    public static function start()
    {
        session_start();
    }
    
    public static function destroy()
    {
        session_destroy();
    }
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $default = null)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        
        return $default;
    }
}