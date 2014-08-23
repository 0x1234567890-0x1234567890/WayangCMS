<?php

class HomeController extends WY_TController
{
	public $layout = 'admin/index';
    
    public function index()
    {
        if(WY_Auth::is_authenticated())
        {
            $this->layout->pageTitle = 'Wayang CMS - Dashboard';
            $this->layout->content = WY_View::fetch('admin/home/statistic');
        }
        else
        {
            WY_Response::redirect('login');
        }
        
    }
}