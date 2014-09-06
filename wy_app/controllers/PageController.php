<?php

class PageController extends WY_TController
{
    public $layout = 'themes/default/layout';
    
    public function menu() {
        $lists = WY_Db::all('Select * from wy_page');
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
        $page = WY_Db::row("select * from wy_page where permalink = :permalink", array(':permalink' => $permalink));
        $this->layout->content = WY_View::fetch('themes/default/page', array('page' => $page));
        $this->layout->pageTitle = 'Wayang - '.$page->title;
    }
} 