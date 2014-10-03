<?php

/**
 * Kelas ini merupakan turunan dari base controller
 * berfungsi menangani rendering layout untuk view
 */
class TController extends Controller
{
    /**
     * @var string nama layout yang akan digunakan controller
     * 
     */
	public $layout = 'layout';
    
    /**
     * Konstruktor
     * 
     */
    public function __construct(){
        
    }
    
    /**
     * Fungsi yang ingin dijalankan sesaat sebelum action
     * 
     */
    public function before_action()
    {
        if (!empty($this->layout) and is_string($this->layout)){
			$this->layout = new WY_View($this->layout);
		}
		parent::before_action();
    }
    
    /**
     * Fungsi yang ingin dijalankan sesaat setelah action
     * 
     */
    public function after_action()
    {
        $this->layout->render();
        parent::after_action();
    }
}