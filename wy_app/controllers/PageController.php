<?php

class PageController extends WY_TController
{
    public $layout = 'layout';
    
    public function index()
    {
        $posts = WY_Db::all('select * from wy_post order by date_add');
        $this->layout->content = WY_View::fetch('index', array('posts' => $posts));
        $this->layout->pageTitle = 'Wayang - Index';
    }
    
    public function view($permalink)
    {
        $post = WY_Db::row("select * from wy_post where permalink = :permalink", array(':permalink' => $permalink));
        $this->layout->content = WY_View::fetch('page', array('post' => $post));
        $this->layout->pageTitle = 'Wayang - Post';
    }
}