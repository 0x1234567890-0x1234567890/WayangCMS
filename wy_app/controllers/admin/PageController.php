<?php

class PageController extends WY_TController
{
    public $layout = 'admin/index';
	
    public function all()
    {
        $pages = WY_Db::all("SELECT * FROM wy_page ORDER BY page_id ASC");
        $this->layout->pageTitle = 'Wayang CMS - Pages All';
        $this->layout->content = WY_View::fetch('admin/pages/all', array('pages'=>$pages));
    }
    
    public function add()
    {
        $this->layout->pageTitle = 'Wayang CMS - Pages Add';
        $this->layout->content = WY_View::fetch('admin/pages/new');
    }
    
    public function view($id)
    {
        
    }
    
    public function edit($id)
    {
        $this->layout->pageTitle = 'Wayang CMS - Pages Edit';
        $this->layout->content = WY_View::fetch('admin/pages/edit');
    }
    
    public function delete($id)
    {
        
    }
}