<?php

class WY_View
{
	protected $view;
    protected $vars = array();
    
    public function __construct($view = null){
        if(!$view){
            throw new Exception("No view was supplied");
        }
        $this->view = $view;
    }
    
    public static function fetch($view = null, $data = null)
    {
        $instance = new static($view);
        return $instance->render(false, $data);
    }
    
    public function __set($key, $value)
    {
        $this->vars[$key] = $value;
    }
    
    public function render($_print_ = true, $_data_ = null)
    {
        extract($this->vars);
        if(!is_null($_data_) and is_array($_data_)) extract($_data_);
        $_view_filepath = BASEPATH.'/wy_app/views/'.$this->view.'.php';
        if(!file_exists($_view_filepath)){
            throw new Exception("The view file doesn't exist");
        }
        if(!$_print_){
            ob_start();
        }
        require $_view_filepath;
        if(!$_print_){
            return ob_get_clean();
        }
    }
}
