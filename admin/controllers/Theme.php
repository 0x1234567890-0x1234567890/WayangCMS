<?php

namespace admin\controllers;

use system\core\Controller;

class Theme extends Controller
{
    public $layout = 'admin/index';
    
    public function all()
    {
        $this->layout->pageTitle = 'Wayang CMS - Themes';
        $this->layout->content = WY_View::fetch('admin/themes/all');
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
