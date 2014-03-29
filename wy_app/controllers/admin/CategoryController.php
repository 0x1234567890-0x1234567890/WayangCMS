<?php

class CategoryController extends WY_TController
{
	public $layout = 'admin/index';
	
    public function all()
    {
        $this->layout->pageTitle = 'Wayang CMS - Categories';
        $this->layout->content = WY_View::fetch('admin/categories/all');
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
