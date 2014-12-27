<?php

namespace system\core;

/**
 * Kelas ini berfungsi menyimpan objek dari kelas lain dan me-manage nya
 * 
 */
class Registry
{
    /**
     * @var array variable penampung objek di dalam registry
     * 
     */
    private static $instances = array();
    
    /**
     * Konstruktor kelas
     * tidak bisa dipanggil
     */
    private function __construct()
    {
        // no implementation
    }
    
    /**
     * tidak bisa dipanggil
     * 
     */
    private function __clone()
    {
        // no implementation
    }
    
    /**
     * mendapatkan objek tertentu berdasarkan key yang disediakan
     * @param string $key key dari objek yang akan diambil
     * @param mixed $default nilai default yang diberikan jika objek tidak ada
     */
    public static function get($key, $default = null)
    {
        if(isset(self::$instances[$key])){
            return self::$instances[$key];
        }
        return $default;
    }
    
    /**
     * menyimpan objek ke registry dengan key tertentu
     * @param string $key key dari objek yang disimpan
     * @param object $value instance dari suatu kelas
     */
    public static function set($key, $value = null)
    {
        self::$instances[$key] = $value;
    }
    
    /**
     * menghapus objek dari registry
     * @param string $key key dari objek yang ingin dihapus
     */
    public static function remove($key)
    {
        unset(self::$instances[$key]);
    }
    
    /**
     * magic method untuk mengakses objek menjadi lebih simple
     * @param string $name nama objek yang ingin diakses
     * @param array $arguments argumen2 yang diberikan saat memanggil static method
     */
    public static function __callStatic($name, $arguments)
    {
        $key = strtolower(substr($name, 3));
        
        if (isset(self::$instances[$key])) {
            return self::$instances[$key];
        }
        
        return null;
    }
}