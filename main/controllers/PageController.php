<?php

namespace main\controllers;

use system\core\Controller;

class PageController extends Controller
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
        $page = WY_Db::row("select * from wy_pages where permalink = :permalink", array(':permalink' => $permalink));
        if($page->use_plugin==0)
        {
            $this->layout->content = WY_View::fetch('themes/default/page', array('page' => $page));
            $this->layout->pageTitle = 'Wayang - '.$page->title;
        }
        else
        {
            $plug=WY_Db::row("select * from wy_plugins where plugin_id = :id", array(':id' => $page->use_plugin));
            $this->layout->content = WY_View::fetch('plugins/'.$plug->plugin_path.'/index', array('page' => $page,'plugin'=>$plug));
            $this->layout->pageTitle = 'Wayang - '.$plug->plugin_name;
        }
    }
} 