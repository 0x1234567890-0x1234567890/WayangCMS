<?php

class PageController extends WY_TController
{
    public $layout = 'themes/default/layout';
    
    public function menu() {
        $lists = WY_Db::all('Select * from wy_pages');
        $this->layout->menu = WY_View::fetch('themes/default/menu',array('lists' => $lists));
    }
    
    public function sidebar() {
        $recent = WY_Db::all('');
        $list = WY_Db::all('');
        $this->layout->menu = WY_View::fetch('themes/default/sidebar',array('recent' => $recent));
    }
    
    public function index($permalink)
    {
        $this->menu(); 
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