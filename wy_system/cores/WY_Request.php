<?php

class WY_Request
{
    public static function get($key, $default = null)
    {
        if(isset($_GET[$key])){
            return $_GET[$key];
        }
        return $default;
    }
    
    public static function post($key, $default = null)
    {
        if(isset($_POST[$key])){
            return $_POST[$key];
        }
        return $default;
    }
    
    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    public static function get_base_url()
    {
        $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https://' : 'http://';
        $path = $_SERVER['PHP_SELF'];
        $path_parts = pathinfo($path);
        $directory = $path_parts['dirname'];
        $directory = ($directory == "/") ? "" : $directory;
        $host = $_SERVER['HTTP_HOST'];
        return $protocol . $host . $directory;
    }
}