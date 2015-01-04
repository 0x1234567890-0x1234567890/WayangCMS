<?php

namespace admin\controllers;

use system\core\Controller;

class LoginController extends Controller
{
    public $layout = 'admin/login';
    public $log;
    
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
    
    public function newpwd($activation)
    {
        $this->layout->pageTitle = 'Wayang CMS - Reset Password';
        $this->layout->content = WY_View::fetch('admin/login/new');
    }
    
    public function login()
    {
        if(WY_Request::isPost())
        {
            $username = $_POST['username'];
            $password = sha1($_POST['password'].WY_Config::get('salt'));
            $this->log = WY_Auth::login($username, $password);
            if($this->log)
            {
                WY_Response::redirect('admin');
            }
            else
            {
                WY_Response::redirect('login');
            }
        }
    }
    
    public function logout()
    {
        WY_Session::destroy();
        WY_Response::redirect('login');
    }
}