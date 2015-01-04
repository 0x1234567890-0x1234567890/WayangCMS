<?php

namespace admin\controllers;

use system\core\Controller;

class HomeController extends Controller
{
    public $layout = 'admin/index';

    public function index()
    {
        echo 'admin index';
    }
    
    public function hello()
    {
        echo 'admin hello';
    }
}