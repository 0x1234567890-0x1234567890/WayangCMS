<?php

/**
 * Kelas ini menangani event-event yang terjadi pada sistem
 * 
 */
class WY_Events
{
    /**
     * @var array variable penyimpan semua callback yang didaftarkan
     * 
     */
	private static $callbacks = array();
    
    /**
     * Konstruktor
     * @access private
     */
    private function __construct()
    {
    
    }
    
    /**
     * @access private
     * 
     */
    private function __clone()
    {
    
    }
    
    /**
     * Mendaftarkan callback dengan tipe tertentu
     * @param string $type tipe event
     * @param closure $callback fungsi yang ingin dijalankan
     */
    public static function add($type, $callback)
    {
        if(empty(self::$callbacks[$type])){
            self::$callbacks[$type] = array();
        }
        self::$callbacks[$type][] = $callback;
    }
    
    /**
     * Memicu event yang sudah didaftarkan
     * @param string $type tipe event
     * @param array $parameters parameter yang akan di lewatkan ke callback
     */
    public static function fire($type, $parameters = null)
    {
        if(!empty(self::$callbacks[$type])){
            foreach(self::$callbacks[$type] as $callback){
                call_user_func_array($callback, $parameters);
            }
        }
    }
    
    /**
     * Menghapus sebuah callback yang telah didaftarkan
     * @param string $type tipe event
     * @param closure fungsi yang akan dihapus
     */
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
