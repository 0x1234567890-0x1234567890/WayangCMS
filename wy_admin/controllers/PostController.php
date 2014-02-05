<?php

class PostController extends WY_Controller{
	
    public function all(){
        $this->render('posts/all.html');
    }
    
    public function new(){
        $this->render('');
    }
    
    public function view($id){
        $this->render('');
    }
    
    public function edit($id){
        $this->render('');
    }
    
    public function delete($id){
        $this->render('');
    }
}