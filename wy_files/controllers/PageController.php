<?php

class PageController extends WY_Controller {
    
    public function index(){
        $database = WY_Registry::get('database');
        $database->connect();
        
        $categories = $database->query()
            ->from('wy_category')
            ->all();
            
        $posts = $database->query()
            ->from('wy_post')
            ->all();
        
        $this->render('page.html', compact('categories', 'posts'));
    }
}