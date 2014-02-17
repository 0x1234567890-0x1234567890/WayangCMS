<?php

class WY_TController extends WY_Controller
{
	public $layout = 'layout';
    
    public function __construct(){
        
    }
    
    public function before_action()
    {
        if (!empty($this->layout) and is_string($this->layout)){
			$this->layout = new WY_View($this->layout);
		}
		parent::before_action();
    }
    
    public function after_action()
    {
        $this->layout->render();
        parent::after_action();
    }
}