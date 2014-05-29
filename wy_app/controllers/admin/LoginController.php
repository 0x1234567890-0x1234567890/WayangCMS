<?php

class LoginController extends WY_TController
{
	public $layout = 'admin/login';
    
    public function index()
    {
        $this->layout->pageTitle = 'Wayang CMS - Login';
        $this->layout->content = WY_View::fetch('admin/login/index');
    }
    
    public function forgot()
    {
        $this->layout->pageTitle = 'Wayang CMS - Reset Password';
        $this->layout->content = WY_View::fetch('admin/login/forgot');
    }
    
    public function login()
    {
        WY_Response::redirect('admin');
    }
    
    public function logout()
    {
        WY_Response::redirect('login');
    }
}