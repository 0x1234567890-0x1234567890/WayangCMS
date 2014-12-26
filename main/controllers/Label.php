<?php

namespace main\controllers;

use system\core\Controller;

class Label extends Controller
{
    public $layout = 'themes/default/layout';
    
    public function menu() {
        $lists = WY_Db::all('Select * from wy_pages');
        $this->layout->menu = WY_View::fetch('themes/default/menu',array('lists' => $lists));
    }
    
    public function sidebar() {
        $recents = WY_Db::all('select * from wy_posts WHERE published=1 order by date_add');
        $lists = WY_Db::all('select * from wy_categories WHERE published=1 order by date_add');
        //$labels = WY_Db::all('');
        $this->layout->sidebar = WY_View::fetch('themes/default/sidebar',array('recents' => $recents,'lists' => $lists));
    }
    
    public function index($permalink)
    {
        $this->menu(); 
        $this->sidebar();
        $cats = WY_Db::row("select * from wy_categories WHERE permalink=:permalink",array("permalink"=>$permalink));
        $posts = WY_Db::all("select * from wy_posts WHERE published=1 AND cat_id=:cat_id order by date_add",array("cat_id"=>$cats->cat_id));
        $this->layout->content = WY_View::fetch('themes/default/label', array('posts' => $posts,'cats'=>$cats));
        $this->layout->pageTitle = 'Wayang - Search ';

    }
} 