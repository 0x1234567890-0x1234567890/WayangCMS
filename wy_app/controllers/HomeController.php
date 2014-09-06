<?php

class HomeController extends WY_TController
{
    public $layout = 'themes/default/layout';
    
    public function menu() {
        $lists = WY_Db::all('Select * from wy_page');
        $this->layout->menu = WY_View::fetch('themes/default/menu',array('lists' => $lists));
    }
    public function index()
    {        
        $this->menu(); 
        $posts = WY_Db::all('select * from wy_post WHERE published=1 order by date_add');
        $this->layout->content = WY_View::fetch('themes/default/index', array('posts' => $posts));
        $this->layout->pageTitle = 'Wayang - Home';
    }
}
