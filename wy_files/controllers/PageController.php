<?php

class PageController extends Controller{
    
    public function index(){
        $categories = $this->container['db_conn']->query('select * from wy_category');
        
        foreach($categories as $category){
            echo $category->cat_title;
            echo '<br />';
        }
    }
}