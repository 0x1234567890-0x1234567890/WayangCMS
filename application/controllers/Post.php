<?php

namespace application\controllers;

use system\core\Controller as Controller;

class Post extends Controller
{
    public $layout = "themes/default/layout";
    
    public function menu() {
        $lists = WY_Db::all('Select * from wy_pages');
        $this->layout->menu = WY_View::fetch('themes/default/menu',array('lists' => $lists));
    }
    
    public function sidebar() {
        $recents = WY_Db::all('select * from wy_posts WHERE published=1 order by date_add');
        $lists = WY_Db::all('select * from wy_categories WHERE published=1 order by date_add');
        //$labels = WY_Db::all('');
        $this->layout->sidebar = WY_View::fetch('themes/default/sidebar',array('recents' => $recents,'lists' => $lists));
    }
    
    public function index($permalink)
    {
        $this->menu(); 
        $this->sidebar(); 
        $post = WY_Db::row("select * from wy_posts where permalink = :permalink", array(':permalink' => $permalink));
        $comment = WY_Db::all("SELECT name,date_format(date,'%b %d %Y %h:%i %p') as date,content from wy_comments WHERE post_id =:id",array(':id'=>$post->post_id));
        $this->layout->content = WY_View::fetch('themes/default/post', array('post' => $post,'comment'=>$comment));
        $this->layout->pageTitle = 'Wayang - '.$post->title;
    }
} 