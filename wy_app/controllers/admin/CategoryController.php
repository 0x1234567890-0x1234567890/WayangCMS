<?php

class CategoryController extends WY_TController
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
        $categories = WY_Db::all('SELECT * FROM wy_categories ORDER BY cat_id ASC');
        $this->layout->pageTitle = 'Wayang CMS - Categories';
        $this->layout->content = WY_View::fetch('admin/categories/all', array('categories'=>$categories));
    }
    
    public function add()
    {
        self::auth();
        if(WY_Request::isPost()){
            $title = $_POST['title'];
            $published = $_POST['published'];
            $permalink = strtolower(str_replace(' ', '-', $title));
            WY_Db::execute('INSERT INTO wy_categories (title, date_add, published, permalink) VALUES 
                (:title, NOW(), :published, :permalink)', array(
                    ':title'=>$title,
                    ':published'=>$published,
                    ':permalink'=>$permalink,
                ));
            WY_Response::redirect('admin/categories/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Add Category';
        $this->layout->content = WY_View::fetch('admin/categories/new');
    }
    
    public function edit($id)
    {
        self::auth();
        $category = WY_Db::row('SELECT * FROM wy_categories WHERE cat_id = :id', array(':id'=> (int) $id));
        if(!$category){
            $view = new WY_View('404');
            $view->render();
            exit();
        }
        if(WY_Request::isPost()){
            $title = $_POST['title'];
            $published = $_POST['published'];
            $permalink = strtolower(str_replace(' ', '-', $title));
            WY_Db::execute('UPDATE wy_categories 
                SET title = :title, date_modified = NOW(), published = :published, permalink = :permalink WHERE cat_id = :id', array(
                    ':title'=>$title,
                    ':published'=>$published,
                    ':permalink'=>$permalink,
                    ':id'=> (int) $id,
                ));
            WY_Response::redirect('admin/categories/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Edit Category';
        $this->layout->content = WY_View::fetch('admin/categories/edit', array('category'=>$category));
    }
    
    public function delete($id)
    {
        self::auth();
        WY_Db::execute('DELETE FROM wy_categories WHERE cat_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/categories/all');
    }
}
