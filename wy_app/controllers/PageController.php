<?php

class PageController extends WY_TController
{
    public $layout = 'layout';
    
    public function index()
    {
        $pages = WY_Db::all("select * from wy_page order by page_date");
        $this->layout->content = '<h1>Page index</h1>';
    }
    
    public function view($name)
    {
        $page = WY_Db::row("select * from wy_page where page_title = :name", array(':name' => $name));
        $this->layout->content = '<h1>Page view</h1>';
    }
}