<?php

namespace wayang;

/**
 * Kelas ini berfungsi sebagai wrapper untuk session pada PHP
 * pengambilan penge-set-an session dilakukan melalui kelas ini
 */
class Session
{
    protected static $flash_types = array('success', 'error', 'info', 'warning');
    
    /**
     * mengeset nilai ke session
     * 
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    /**
     * membaca sebuah nilai dari session
     * 
     */
    public static function get($key, $default = null)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return $default;
    }
    
    /**
     * menghancurkan session pengguna saat ini
     * 
     */
    public static function destroy()
    {
        $_SESSION = array();
        session_destroy();
        session_write_close();
    }
    
    /**
     * mengeset flash message
     * 
     */
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
    
    /**
     * membaca flash message
     * 
     */
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
    
    /**
     * membersihkan flash message
     * 
     */
    public static function clear_flash($type = 'all')
    {
        if($type == 'all'){
            unset($_SESSION['flash_message']);
        }else{
            unset($_SESSION['flash_message'][$type]);
        }
    }
    
    /**
     * mengecek apakah terdapat flash message bertipe error
     * 
     */
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
    
    /**
     * mengecek apakah terdapat flash message tipe tertentu
     * 
     */
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