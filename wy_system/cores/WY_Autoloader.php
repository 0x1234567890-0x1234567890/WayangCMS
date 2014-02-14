<?php

class WY_Autoloader
{
    
    public static function register($prepend = false)
    {
        set_include_path(get_include_path().PATH_SEPARATOR."wy_app/controllers");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_system/cores");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_system/libs");
        set_include_path(get_include_path().PATH_SEPARATOR."wy_plugins");
        
        if (version_compare(phpversion(), '5.3.0', '>=')) {
            spl_autoload_register(array(new self, 'autoload'), true, $prepend);
        } else {
            spl_autoload_register(array(new self, 'autoload'));
        }
    }
    
    public static function autoload($class)
    {
        if (0 === strpos($class, 'Twig')) {
            return;
        }
        
        require "{$class}.php";
    }
}
