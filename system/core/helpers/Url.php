<?php

namespace system\core\helpers;

use system\core\Registry;

class Url
{
	public static function to($route)
    {
        $baseUrl = Registry::getRequest()->baseUrl();
        
        $controller_action = array_shift($route);
        
        $params = implode('/', $route);
        
        $url = $baseUrl.'/'.$controller_action.'/'.$params;
        
        return $url;
    }
}
