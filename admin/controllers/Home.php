<?php

namespace admin\controllers;

use system\core\Controller;

class Home extends Controller
{
    public $layout = 'admin/index';

    public function index()
    {
        $pages = WY_Db::row("SELECT COUNT(*) as num FROM wy_pages");
        $posts = WY_Db::row("SELECT COUNT(*) as num FROM wy_posts");
        $comments = WY_Db::row("SELECT COUNT(*) as num FROM wy_comments");
        $users = WY_Db::row("SELECT COUNT(*) as num FROM wy_users");
        $this->layout->pageTitle = 'Wayang CMS - Dashboard';
        $this->layout->content = WY_View::fetch('admin/home/statistic',array("pages"=>$pages,"posts"=>$posts,"comments"=>$comments,"users"=>$users));
    }
}