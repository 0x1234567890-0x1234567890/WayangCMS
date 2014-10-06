<?php

namespace system\core;

use system\core\Base as Base;

/**
 * Kelas ini berfungsi sebagai base controller
 * 
 */
class Controller extends Base
{
    /**
     * @var string aksi default yang dijalankan ketika tidak disediakan melalui url
     * 
     */
    public $default_action = 'index';
    
    /**
     * Konstruktor
     * 
     */
    public function __construct()
    {
        
    }
    
    /**
     * Fungsi yang ingin dijalankan sesaat sebelum action
     * 
     */
    public function before_action()
    {
        
    }
    
    /**
     * Fungsi yang ingin dijalankan sesaat setelah action
     * 
     */
    public function after_action()
    {
        
    }
}