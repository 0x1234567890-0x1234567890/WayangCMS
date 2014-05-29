<?php

class PostController extends WY_TController
{
    public $layout = 'admin/index';
    
    public function all()
    {
        $this->layout->pageTitle = 'Wayang CMS - Posts';
        $this->layout->content = WY_View::fetch('admin/posts/all');
    }
    
    public function add()
    {
        $this->layout->pageTitle = 'Wayang CMS - Post Add';
        $this->layout->content = WY_View::fetch('admin/posts/new');
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