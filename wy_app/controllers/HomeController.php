<?php

class HomeController extends WY_TController
{
    public $layout = 'layout';
    
    public function index()
    {
        $posts = WY_Db::all('select * from wy_post order by date_add');
        $this->layout->content = WY_View::fetch('index', array('posts' => $posts));
        $this->layout->pageTitle = 'Wayang - Home';
    }
    
} 