<?php

namespace system\core;

/**
 * Kelas ini berfungsi menangani rendering view dan layout sistem
 * 
 */
class View
{
    /**
     * @var string nama file view
     * 
     */
	protected $view;
    
    /**
     * @var string judul halaman
     * 
     */
    public $title = "";
    
    public $blocks;
    
    /**
     * Konstruktor
     * @param string $view nama file view yang akan dirender
     */
    public function __construct($view = null){
        if(!$view){
            throw new Exception("No view was supplied");
        }
        $this->view = $view;
    }
    
    /**
     * me-render view yang telah ditetapkan
     * @param boolean $_print_ menentukan apakah view langsung di echo atau tidak
     * @param mixed $_data_ data-data yang akan di outputkan
     */
    public function render($_print_ = true, $_data_ = null)
    {
        if(!is_null($_data_) and is_array($_data_)) extract($_data_, EXTR_SKIP);
        
        $_view_filepath = BASEPATH.'/wy_app/views/'.$this->view.'.php';
        
        if(!file_exists($_view_filepath)){
            throw new Exception("The view file doesn't exist");
        }
        
        if(!$_print_){
            ob_start();
        }
        
        require_once $_view_filepath;
        
        if(!$_print_){
            return ob_get_clean();
        }
    }
}
