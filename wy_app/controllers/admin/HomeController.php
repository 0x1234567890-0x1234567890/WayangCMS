<?php

class HomeController extends WY_TController
{
	public $layout = 'admin/index';
    
    public function index()
    {
        $this->layout->content = WY_View::fetch('admin/home/statistic');
    }
}