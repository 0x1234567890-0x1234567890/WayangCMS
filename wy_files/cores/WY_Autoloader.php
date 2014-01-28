<?php

class WY_Autoloader {
    
    public static function register($prepend = false){
        set_include_path(get_include_path().PATH_SEPARATOR."wy_files/controllers");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_files/cores");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_files/libs");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_files/models");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_files/plugins");
        
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
