<?php

class PageController extends WY_TController
{
    public $layout = 'admin/index';
	
    public function all()
    {
        $pages = WY_Db::all("SELECT * FROM wy_pages ORDER BY page_id ASC");
        $this->layout->pageTitle = 'Wayang CMS - Pages All';
        $this->layout->content = WY_View::fetch('admin/pages/all', array('pages'=>$pages));
    }
    
    public function add()
    {
        if(WY_Request::isPost()){
            $author=  WY_Session::get('display');
            $title = $_POST['title'];
            if(isset($_POST['published']))
            {
                $published = 1;
            }
            else{
                $published = 0;
            }
            if(isset($_POST['a_comment']))
            {
                $comment = 1;
            }
            else{
                $comment = 0;
            }
            $plugin= $_POST['plugin'];
            $content = $_POST['content'];
            $isParent = $_POST['isParent'];
            $tags = $_POST['tags'];
            $permalink = strtolower(str_replace(' ', '-', $title));
            WY_Db::execute('INSERT INTO `wy_pages`'
                    . '(`author`, `title`, `date_add`, `content`, `comment_open`, `published`, `use_plugin`, `is_parent`, `permalink`, `tag`) '
                    . 'VALUES '
                    . '(:author,:title,NOW(),:content,:comment_open,:published,:use_plugin,:is_parent,:permalink,:taglist)', array(
                    ':author'=>$author,
                    ':title'=>$title,
                    ':content'=>$content,                    
                    ':comment_open'=>$comment,
                    ':published'=>$published,
                    ':use_plugin'=>$plugin,
                    ':is_parent'=>$isParent, 
                    ':permalink'=>$permalink,
                    ':taglist'=>$tags,
                ));
            WY_Response::redirect('admin/pages/all');
        }
        $isParent = WY_Db::all('SELECT * FROM wy_pages WHERE is_parent = 0');
        $plugins = WY_Db::all("SELECT * FROM `wy_plugins` WHERE `is_active` = 1 ORDER BY plugin_name ASC");
        $this->layout->pageTitle = 'Wayang CMS - Pages Add';
        $this->layout->content = WY_View::fetch('admin/pages/new',array('isParent'=>$isParent,'plugins'=>$plugins));
    }
    
    public function view($id)
    {
        
    }
    
    public function edit($id)
    {
        $page = WY_Db::row('SELECT * FROM wy_pages WHERE page_id = :id', array(':id'=> (int) $id));
        if(!$page){
            $view = new WY_View('404');
            $view->render();
            exit();
        }
        $isParent = WY_Db::all('SELECT * FROM wy_pages WHERE is_parent = 0 AND page_id <> :id' , array(':id'=> (int) $id));
        $plugins = WY_Db::all("SELECT * FROM `wy_plugins` WHERE `is_active` = 1 ORDER BY plugin_name ASC");
        if(WY_Request::isPost()){
            $title = $_POST['title'];
            if(isset($_POST['published']))
            {
                $published = 1;
            }
            else{
                $published = 0;
            }
            if(isset($_POST['a_comment']))
            {
                $comment = 1;
            }
            else{
                $comment = 0;
            }
            $isParent = $_POST['isParent'];
            $content = $_POST['content'];
            $tags = $_POST['tags'];
            $permalink = strtolower(str_replace(' ', '-', $title));
            WY_Db::execute('UPDATE wy_pages 
                SET title = :title, date_modified = NOW(), content = :content, published = :published, is_parent= :is_parent, permalink = :permalink, comment_open = :comment_open, tag = :taglist WHERE page_id = :id', array(
                    ':title'=>$title,
                    ':published'=>$published,
                    ':content'=>$content,
                    ':is_parent'=>$isParent,
                    ':comment_open'=>$comment,
                    ':permalink'=>$permalink,
                    ':taglist'=>$tags,
                    ':id'=> (int) $id,
                ));
            WY_Response::redirect('admin/pages/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Pages Edit';
        $this->layout->content = WY_View::fetch('admin/pages/edit',array('page'=>$page, 'isParent'=>$isParent,'plugins'=>$plugins));
    }
    
    public function delete($id)
    {
        WY_Db::execute('DELETE FROM wy_pages WHERE page_id = :id', array(':id'=> (int) $id));
        WY_Db::execute('DELETE FROM wy_comments WHERE page_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/pages/all');
    }
}