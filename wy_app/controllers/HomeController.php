<?php

class HomeController extends WY_TController
{
    public $layout = 'themes/default/layout';
    
    public function menu() {
        $lists = WY_Db::all('Select * from wy_pages WHERE published=1 AND is_parent=0');
        $this->layout->menu = WY_View::fetch('themes/default/menu',array('lists' => $lists));
    }
    
    public function sidebar() {
        $recents = WY_Db::all('select * from wy_posts WHERE published=1 order by date_add DESC');
        $lists = WY_Db::all('select * from wy_categories WHERE published=1 order by date_add');
        //$labels = WY_Db::all('');
        $this->layout->sidebar = WY_View::fetch('themes/default/sidebar',array('recents' => $recents,'lists' => $lists));
    }
    
    public function index()
    {
        $this->menu(); 
        $this->sidebar(); 
        $posts = WY_Db::all('select * from wy_posts WHERE published=1 order by date_add');
        $this->layout->content = WY_View::fetch('themes/default/index', array('posts' => $posts));
        $this->layout->pageTitle = 'Wayang - Home';
    }
}
