<?php

namespace system\core;
/**
 * Kelas ini merupakan induk dari segala kelas model
 * Berfungsi sebagai layer tambahan untuk mengakses database
 * sehingga pengaksesan database menjadi lebih simple
 */
class Model
{
    /**
     * Konstruktor kelas
     * 
     */
	public function __construct()
    {
        
    }
    
    public function __get($key)
    {
        $getter = 'get' . ucfirst($key);
        if (method_exists($this, $getter)) {
            return $this->$getter();
        }
        
        return null;
    }
    
    public function getDb()
    {
        return Registry::getDb();
    }
    
    public static function getDb()
    {
        return Registry::getDb();
    }
}