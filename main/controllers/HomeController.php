<?php

namespace main\controllers;

use system\core\Controller;

use main\models\User;
use main\models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $this->render('index', array(
            'posts' => Post::getAll(),
        ));
    }
    
    public function hello($id, $name)
    {
        echo 'hello '.$id.' '.$name;
    }
    
    public function redir()
    {
        $this->redirect('/');
    }
    
    public function query()
    {
        $users = User::getAll();
        
        echo "<pre>";
        print_r($users);
        echo "</pre>";
    }
}
