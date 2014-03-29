<?php

class UserController extends WY_TController
{
	public $layout = 'admin/index';
	
    public function all()
    {
        $this->layout->pageTitle = 'Wayang CMS - Users';
        $this->layout->content = WY_View::fetch('admin/users/all');
    }
    
    public function add()
    {
        $this->layout->pageTitle = 'Wayang CMS - Users Add';
        $this->layout->content = WY_View::fetch('admin/users/add');
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
