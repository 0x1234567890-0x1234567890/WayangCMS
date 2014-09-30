<?php

class HomeController extends WY_TController
{
    public $layout = 'admin/index';
    
    public static function auth()
    {
        if(!WY_Auth::is_authenticated())
        {
            WY_Response::redirect('login');
        }   
    }

    public function index()
    {
        self::auth();
        $pages=wy_db::row("SELECT COUNT(*) as num FROM wy_pages");
        $posts=wy_db::row("SELECT COUNT(*) as num FROM wy_posts");
        $comments=wy_db::row("SELECT COUNT(*) as num FROM wy_comments");
        $users=wy_db::row("SELECT COUNT(*) as num FROM wy_users");
        $this->layout->pageTitle = 'Wayang CMS - Dashboard';
        $this->layout->content = WY_View::fetch('admin/home/statistic',array("pages"=>$pages,"posts"=>$posts,"comments"=>$comments,"users"=>$users));
    }
}