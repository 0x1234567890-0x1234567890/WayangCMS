<?php

namespace main\controllers;

use system\core\Controller;

class Home extends Controller
{
    public function index()
    {
        $this->render('index', array('name' => 'Rully Ramanda'));
    }
    
    public function hello($id, $name)
    {
        echo 'hello '.$id.' '.$name;
    }
    
    public function redir()
    {
        $this->redirect('/');
    }
}
