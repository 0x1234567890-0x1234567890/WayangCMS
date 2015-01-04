<?php

namespace main\controllers;

use system\core\Controller;

class HomeController extends Controller
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
    
    public function query()
    {
        $users = $this->db->query('select * from wy_user');
        
        echo "<pre>";
        print_r($users);
        echo "</pre>";
    }
}
