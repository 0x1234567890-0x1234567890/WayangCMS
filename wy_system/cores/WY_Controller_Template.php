<?php

class WY_Controller_Template
{
	public $template = 'template';
    public $view;
    
    public function __construct(){
        $this->view = new WY_View($this->template);
    }
    
    public function render_template(){
        $this->view->render(true);
    }
}
