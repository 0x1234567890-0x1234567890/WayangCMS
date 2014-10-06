<?php

namespace system\core;

class Core
{
    
	public static function init()
    {
        if(!defined('BASEPATH')){
            throw new \Exception('BASEPATH not initialized');
        }
        
        spl_autoload_register(__CLASS__."::_autoload");
    }
    
    protected static function _autoload($class)
    {
        $file = str_replace("\\", DIRECTORY_SEPARATOR, trim($class, "\\")).'.php';
        
        if(file_exists($file)){
            require $file;
            return;
        }
    }
}
