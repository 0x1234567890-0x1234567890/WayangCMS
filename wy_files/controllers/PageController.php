<?php

require_once BASEPATH.'/wy_files/models/Category.php';

class PageController{
    
    public function index(){
        $categories = Category::findAll(array(
            //'where_raw' => array('cat_title = ? or cat_title = ?', array('programming', 'hacking')),
            'where_in' => array('cat_title', array('programming', 'hacking')),
            //'order_by_asc' => 'cat_title',
        ));
        foreach($categories as $category){
            echo $category->cat_title;
            echo '<br />';
        }
    }
}