<?php

namespace system\core;

/**
 * Kelas ini berfungsi sebagai wrapper untuk session pada PHP
 * pengambilan penge-set-an session dilakukan melalui kelas ini
 */
class Session
{
    /**
     * memulai sesi
     * 
     */
    public static function start()
    {
        session_start();
    }
    
    /**
     * menghancurkan sesi saat ini
     * 
     */
    public static function destroy()
    {
        session_destroy();
    }
    
    /**
     * menyimpan nilai ke sesi
     * @param string $key key dari nilai yang akan disimpan
     * @param mixed $value nilai yang akan disimpan
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    /**
     * mendapatkan suatu nilai dari sesi
     * @param string $key key dari nilai yang ingin didapatkan
     * @param mixed $default nilai default jika nilai yang diinginkan tidak ada
     */
    public static function get($key, $default = null)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
        
        return $default;
    }
}