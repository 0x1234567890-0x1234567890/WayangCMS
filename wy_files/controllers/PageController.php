<?php

class PageController extends Controller{
    
    public function index(){
        $categories = 
        
        foreach($categories as $category){
            echo $category->cat_title;
            echo '<br />';
        }
    }
}