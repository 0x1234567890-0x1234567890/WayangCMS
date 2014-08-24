<?php

class PageController extends WY_TController
{
    public $layout = 'layout';
    
    public function index($permalink)
    {
        $post = WY_Db::row("select * from wy_page where permalink = :permalink", array(':permalink' => $permalink));
        $this->layout->content = WY_View::fetch('page', array('post' => $post));
        $this->layout->pageTitle = 'Wayang - Page';
    }
}