<?php

/**
 * Kelas ini berfungsi menangani HTTP request
 * 
 */
class WY_Request
{
    /**
     * Mendapatkan satu parameter dari GET method
     * @param string $key kunci parameter yang dicari
     * @param mixed $default nilai default jika parameter tidak di temukan
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        if(isset($_GET[$key])){
            return $_GET[$key];
        }
        return $default;
    }
    
    /**
     * Mendapatkan satu parameter dari POST method
     * @param string $key kunci parameter yang dicari
     * @param mixed $default nilai default jika parameter tidak di temukan
     * @return mixed
     */
    public static function post($key, $default = null)
    {
        if(isset($_POST[$key])){
            return $_POST[$key];
        }
        return $default;
    }
    
    /**
     * Memeriksa apakah request saat ini melalui GET method
     * @return boolean
     */
    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    
    /**
     * Memeriksa apakah request saat ini melalui POST method
     * @return boolean
     */
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    
    /**
     * Mendapatkan base url dari sistem
     * @return string base_url sistem saat ini
     */
    public static function base_url()
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