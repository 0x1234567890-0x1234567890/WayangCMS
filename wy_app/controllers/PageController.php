<?php

class PageController extends WY_Controller_Template
{
    public $template = 'layout';
    
    public function index()
    {
        //$pages = WY_Db::all("select * from wy_page order by page_date");
        //$view = new WY_View('index');
        //$view->pages = $pages;
        //$view->render();
        $this->view->content = '<h1>Page index</h1>';
    }
    
    public function view($name)
    {
        $page = WY_Db::row("select * from wy_page where page_title = :name", array(':name' => $name));
        $view = new WY_View('page');
        $view->page = $page;
        $view->render();
    }
}