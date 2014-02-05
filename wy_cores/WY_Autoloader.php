<?php

class WY_Autoloader {
    
    public static function register($prepend = false){
        set_include_path(get_include_path().PATH_SEPARATOR."wy_front/controllers");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_admin/controllers");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_cores");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_cores/config");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_cores/config/drivers");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_cores/db");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_cores/db/drivers");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_cores/db/query");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_cores/utils");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_libs");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_plugins");
        
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            spl_autoload_register(array(new self, 'autoload'), true, $prepend);
        } else {
            spl_autoload_register(array(new self, 'autoload'));
        }
    }
    
    public static function autoload($class){
        if (0 === strpos($class, 'Twig')) {
            return;
        }
        
        require "{$class}.php";
    }
}
