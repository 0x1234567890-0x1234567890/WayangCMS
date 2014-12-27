<?php

namespace system\core;

/**
 * Kelas ini berfungsi menangani HTTP request
 * 
 */
class Request
{
    /**
     * Mendapatkan satu parameter dari GET method
     * @param string $key kunci parameter yang dicari
     * @param mixed $default nilai default jika parameter tidak di temukan
     * @return mixed
     */
    public function get($key, $default = null)
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
    public function post($key, $default = null)
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
    public function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    
    /**
     * Memeriksa apakah request saat ini melalui POST method
     * @return boolean
     */
    public function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
}