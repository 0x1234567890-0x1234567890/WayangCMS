<?php
class PostController extends WY_TController
{
    public $layout = "layout";
    
    public function menu() {
        $lists = WY_Db::all('Select * from wy_page');
        $this->layout->menu = WY_View::fetch('menu',array('lists' => $lists));
    }
    
    public function index($permalink)
    {
        $this->menu();
        $post = WY_Db::row("select * from wy_post where permalink = :permalink", array(':permalink' => $permalink));
        $this->layout->content = WY_View::fetch('post', array('post' => $post));
        $this->layout->pageTitle = 'Wayang - Post';
    }
} 