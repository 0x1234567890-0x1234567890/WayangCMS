<?php

class HomeController extends WY_Controller_Template
{
	public $template = 'admin/index';
    
    public function index()
    {
        $this->view->content = WY_View::fetch('admin/home/statistic');
    }
}