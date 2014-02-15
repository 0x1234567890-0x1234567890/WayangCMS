<?php

class WY_Session
{
    protected static $flash_types = array('success', 'error', 'info', 'warning');
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function get($key, $default = null)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return $default;
    }
    
    public static function destroy()
    {
        $_SESSION = array();
        session_destroy();
        session_write_close();
    }
    
    public static function set_flash($type, $message)
    {
        if(!in_array($type, self::$flash_types)){
            return false;
        }
        if(!isset($_SESSION['flash_message'])){
            $_SESSION['flash_message'] = array();
        }
        if(is_string($message)){
            $_SESSION['flash_message'][$type][] = $message;
        }elseif(is_array($message)){
            foreach($message as $msg){
                $_SESSION['flash_message'][$type][] = $msg;
            }
        }
    }
    
    public static function get_flash($type = 'all')
    {
        if(!isset($_SESSION['flash_message'][$type])){
            return false;
        }
        if(!in_array($type, self::$flash_types)){
            return false;
        }
        if(!isset($_SESSION['flash_message'][$type])){
            return false;
        }
        if($type == 'all'){
            foreach($_SESSION['flash_message'] as $type => $msg_array){
                foreach($type as $key => $message){
                    echo $message;
                }
            }
            self::clear_flash($type);
        }else{
            foreach($_SESSION['flash_message'][$type] as $message){
                echo $message;
            }
            self::clear_flash($type);
        }
    }
    
    public static function clear_flash($type = 'all')
    {
        if($type == 'all'){
            unset($_SESSION['flash_message']);
        }else{
            unset($_SESSION['flash_message'][$type]);
        }
    }
    
    public static function flash_has_error()
    {
         if(!isset($_SESSION['flash_message'][$type])){
            return false;
        }
        if(!in_array($type, self::$flash_types)){
            return;
        }
        if(isset($_SESSION['flash_message']['error'])){
            return true;
        }
        return false;
    }
    
    public static function has_flash($type)
    {
        if(!isset($_SESSION['flash_message'][$type])){
            return false;
        }
        if(!in_array($type, self::$flash_types)){
            return;
        }
        if(isset($_SESSION['flash_message'][$type])){
            return true;
        }
        return false;
    }
}