<?php

/**
 * Kelas ini berfungsi menyimpan objek dari kelas lain dan me-manage nya
 * 
 */
class WY_Registry
{
    /**
     * @var array variable penyimpan objek-objek kelas lain
     * 
     */
    private static $instances = array();
    
    /**
     * Konstruktor
     * @access private
     */
    private function __construct()
    {
        
    }
    
    /**
     * @access private
     * 
     */
    private function __clone()
    {
        
    }
    
    /**
     * Mendapatkan satu objek yang telah tersimpan sebelumnya
     * @param string $key kunci objek yang dicari
     * @param mixed $default nilai default yang dikembalikan jika objek tidak ditemukan
     * @return mixed objek yang dicari, null jika tidak ditemukan
     */
    public static function get($key, $default=null)
    {
        if(isset(self::$instances[$key])){
            return self::$instances[$key];
        }
        return $default;
    }
    
    /**
     * Menyimpan sebuah objek
     * @param string $key kunci objek yang akan disimpan
     * @param object $value objek yang akan disimpan
     */
    public static function set($key, $value)
    {
        self::$instances[$key] = $value;
    }
    
    /**
     * Menghapus sebuah objek dari penyimpanan
     * @param string $key kunci objek yang akan dihapus
     */
    public static function remove($key)
    {
        unset(self::$instances[$key]);
    }
}