<?php

namespace admin\controllers;

use system\core\Controller;

class PrefController extends Controller
{
    public $layout = 'admin/index';
    
    public function all()
    {
        $this->layout->pageTitle = 'Wayang CMS - Preferences';
        $this->layout->content = WY_View::fetch('admin/sites/prefs');
    }
    
    public function add()
    {
        
    }
    
    public function view($id)
    {
        
    }
    
    public function edit($id)
    {
        
    }
    
    public function delete($id)
    {
        
    }
}
