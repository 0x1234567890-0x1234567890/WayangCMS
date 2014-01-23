<?php

class PageController extends Controller{
    
    public function index(){
        $dbConn = $this->container['db_conn'];
        
        $categories = $dbConn->query('select * from wy_category');
        $posts = $dbConn->query('select * from wy_post');
        $installUrl = $this->container['router']->generate('install');
        
        $this->render('page.html', compact('categories', 'posts', 'installUrl'));
    }
}