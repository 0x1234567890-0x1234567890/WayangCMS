<?php

class WY_Events
{
	private static $callbacks = array();
    
    private function __construct()
    {
    
    }
    
    private function __clone()
    {
    
    }
    
    public static function add($type, $callback)
    {
        if(empty(self::$callbacks[$type])){
            self::$callbacks[$type] = array();
        }
        self::$callbacks[$type][] = $callback;
    }
    
    public static function fire($type, $parameters = null)
    {
        if(!empty(self::$callbacks[$type])){
            foreach(self::$callbacks[$type] as $callback){
                call_user_func_array($callback, $parameters);
            }
        }
    }
    
    public static function remove($type, $callback)
    {
        if(!empty(self::$callbacks[$type])){
            foreach(self::$callbacks[$type] as $i => $found){
                if($callback == $found){
                    unset(self::$callbacks[$type][$i]);
                }
            }
        }
    }
}
