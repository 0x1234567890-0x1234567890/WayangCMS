<?php
class PostController extends WY_TController
{
    public $layout = "layout";
    
    public function index($permalink)
    {
        $post = WY_Db::row("select * from wy_post where permalink = :permalink", array(':permalink' => $permalink));
        $this->layout->content = WY_View::fetch('post', array('post' => $post));
        $this->layout->pageTitle = 'Wayang - Post';
    }
}