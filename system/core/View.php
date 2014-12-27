<?php

namespace system\core;

/**
 * Kelas ini berfungsi menangani rendering view dan layout sistem
 * 
 */
class View
{   
    /**
     * @var string judul halaman
     * 
     */
    public $title = "";
    
    /**
     * @var array blok untuk konten dinamis
     * 
     */
    public $blocks;
    
    /**
     * @var array parameter yang tersedia di semua view
     * 
     */
    public $params;
    
    /**
     * me-render view yang telah ditetapkan
     * @param mixed $_data_ data-data yang akan di outputkan
     * @param boolean $_print_ menentukan apakah view langsung di echo atau tidak
     */
    public function render($_view_, $_data_ = null, $_print_ = true)
    {
        if (!is_null($_data_) and is_array($_data_)) {
            extract($_data_, EXTR_SKIP);
        }
        
        if (!file_exists($_view_)) {
            throw new Exception("The view file doesn't exist");
        }
        
        if (!$_print_) {
            ob_start();
        }
        
        require_once $_view_;
        
        if (!$_print_) {
            return ob_get_clean();
        }
    }
    
    public function beginBlock($key)
    {
        
    }
    
    public function endBlock()
    {
        
    }
}
