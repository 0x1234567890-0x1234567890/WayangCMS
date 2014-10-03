<?php

namespace wayang;

/**
 * Kelas ini berfungi sebagai autoloader untuk kelas lain yang
 * diperlukan ketika sistem berjalan
 */
class Autoloader
{
    /**
     * Fungsi ini bertujuan mendaftarkan autoloader ke php
     * @param boolean $prepend apakah autoloader di tambahkan dari depan stack
     */
    public static function register($prepend = false)
    {
        set_include_path(get_include_path().PATH_SEPARATOR."wy_system/cores");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_system/libs");
        
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            spl_autoload_register(array(new self, 'autoload'), true, $prepend);
        } else {
            spl_autoload_register(array(new self, 'autoload'));
        }
    }
    
    /**
     * Fungsi untuk meng-autoload kelas-kelas
     * @param string $class kelas yang hendak dimuat
     */
    public static function autoload($class)
    {
        require "{$class}.php";
    }
}