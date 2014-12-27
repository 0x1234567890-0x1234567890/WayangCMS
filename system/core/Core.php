<?php

namespace system\core;

/**
 * Kelas ini adalah sebagai pemicu awal dan sebagai autoloader juga
 * 
 */
class Core
{
    /**
     * fungsi inisialisasi kelas
     * 
     */
	public static function init()
    {
        if(!defined('BASEPATH')){
            throw new \Exception('BASEPATH not initialized');
        }
        
        spl_autoload_register(__CLASS__."::_autoload");
    }
    
    /**
     * fungsi autoloader semua untuk kelas yang ada dalam cms
     * @param string $class nama kelas yang hendak dimuat
     */
    protected static function _autoload($class)
    {
        $file = str_replace("\\", DIRECTORY_SEPARATOR, trim($class, "\\")).'.php';
        
        if(file_exists($file)){
            require $file;
            return;
        }
    }
}
