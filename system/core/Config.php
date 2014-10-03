<?php

/**
 * Kelas ini berfungsi memuat dan me-manage konfigurasi
 * 
 */
class Config
{
    /**
     * @var array variable tempat penyimpanan item-item konfigurasi
     * 
     */
    private static $config_items = array();
    
    /**
     * Memuat file konfigurasi berdasarkan path yang diberikan
     * @param string $config_path lokasi ke file konfigurasi
     */
    public static function load($config_path)
    {
        if(file_exists($config_path)){
            self::$config_items = include $config_path;
            return true;
        }else{
            return false;
        }
    }
    
    /**
     * Menyimpan satu item konfigurasi
     * @param string $key kunci item yang akan disimpan
     * @param string $value nilai item yang akan disimpan
     */
    public static function set($key, $value)
    {
        self::$config_items[$key] = $value;
    }
    
    /**
     * Mendapatkan satu item konfigurasi
     * @param string $key kunci item yang dicari
     * @param mixed $default nilai default jika kunci yang dicari tidak ditemukan
     * @return mixed tergantung isi dari kunci yang dicari
     */
    public static function get($key, $default = null)
    {
        if(isset(self::$config_items[$key])){
            return self::$config_items[$key];
        }
        return $default;
    }
    
    /**
     * Memeriksa apakah kunci tertentu ada di konfigurasi
     * @param string $key kunci item yang dicari
     * @return boolean
     */
    public static function has($key)
    {
        if(isset(self::$config_items[$key])){
            return true;
        }
        return false;
    }
}