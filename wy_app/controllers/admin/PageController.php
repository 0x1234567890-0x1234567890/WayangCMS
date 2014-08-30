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
        $page = WY_Db::row('SELECT * FROM wy_page WHERE page_id = :id', array(':id'=> (int) $id));
        if(!$page){
            $view = new WY_View('404');
            $view->render();
            exit();
        }
        $isParent = WY_Db::row('SELECT * FROM wy_page WHERE is_parent = 0');
        if(!$isParent){
            $view = new WY_View('404');
            $view->render();
            exit();
        }
        if(WY_Request::isPost()){
            $title = $_POST['title'];
            $published = $_POST['published'];
            $isParent = $_POST['isParent'];
            $content = $_POST['content'];
            $comment = $_POST['a_comment'];
            $permalink = strtolower(str_replace(' ', '-', $title));
            WY_Db::execute('UPDATE wy_page 
                SET title = :title, date_modified = NOW(), content = :content, published = :published, is_parent= :is_parent, permalink = :permalink, comment_open = :comment_open WHERE page_id = :id', array(
                    ':title'=>$title,
                    ':published'=>$published,
                    ':content'=>$content,
                    ':is_parent'=>$isParent,
                    ':comment_open'=>$comment,
                    ':permalink'=>$permalink,
                    ':id'=> (int) $id,
                ));
            WY_Response::redirect('admin/pages/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Pages Edit';
        $this->layout->content = WY_View::fetch('admin/pages/edit',array('page'=>$page));
        $this->layout->content = WY_View::fetch('admin/pages/edit',array('isParent'=>$isParent));
    }
    
    public function delete($id)
    {
        
    }
}