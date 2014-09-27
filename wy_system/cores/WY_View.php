<?php

/**
 * Kelas ini berfungsi menangani rendering view dan layout sistem
 * 
 */
class WY_View
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
    public $pageTitle = "";
    
    /**
     * @var array variable penyimpanan data-data untuk ditampilkan
     * 
     */
    protected $vars = array();
    
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
     * mengambil output dari suatu file view
     * @param string $view nama file view yang akan di fetch
     * @param array $data variable-variable yang akan di outputkan
     * @return View instance dari kelas ini
     */
    public static function fetch($view = null, $data = null)
    {
        $instance = new static($view);
        return $instance->render(false, $data);
    }
    
    /**
     * menge-set nilai dari variable yang akan di outputkan di view
     * @param string $key kunci dari data
     * @param mixed $value nilai dari data
     */
    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }
    
    /**
     * me-render view yang telah ditetapkan
     * @param boolean $_print_ menentukan apakah view langsung di echo atau tidak
     * @param mixed $_data_ data-data yang akan di outputkan
     */
    public function render($_print_ = true, $_data_ = null)
    {
        extract($this->vars);
        if(!is_null($_data_) and is_array($_data_)) extract($_data_, EXTR_SKIP);
        $_view_filepath = BASEPATH.'/wy_themes/'.$this->view.'.php';
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
