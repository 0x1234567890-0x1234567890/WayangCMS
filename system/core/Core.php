<?php

namespace wayang;

class Core
{
	public static function init()
    {
        if(!defined('BASEPATH')){
            throw new \Exception('BASEPATH not initialized');
        }
        
        spl_autoload_register(__CLASS__."::_autoload");
    }
    
    
}
