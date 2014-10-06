<?php

namespace application\controllers\admin;

use system\core\Controller as Controller;

class Pref extends Controller
{
    public $layout = 'admin/index';
    
    public static function auth()
    {
        if(!WY_Auth::is_authenticated())
        {
            WY_Response::redirect('login');
        }   
    }
    
    public function all()
    {
        self::auth();
        $this->layout->pageTitle = 'Wayang CMS - Preferences';
        $this->layout->content = WY_View::fetch('admin/sites/prefs');
    }
    
    public function add()
    {
        
        self::auth();
    }
    
    public function view($id)
    {
        self::auth();
        
    }
    
    public function edit($id)
    {
        self::auth();
        
    }
    
    public function delete($id)
    {
        self::auth();
        
    }
}
