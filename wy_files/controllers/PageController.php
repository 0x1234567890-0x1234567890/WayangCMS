<?php

class PageController extends WY_Controller {
    
    public function index(){
        $database = WY_Registry::get('database');
        $database->connect();
        
        $pages = $database->query()
            ->from('wy_page')
            ->all();
        
        $this->render('index.html', compact('pages'));
    }
    
    public function view($name){
        $database = WY_Registry::get('database');
        $database->connect();
        
        $page = $database->query()
            ->from('wy_page')
            ->where('page_title=?', array($name))
            ->first();
        
        $this->render('page.html', compact('page'));
    }
}