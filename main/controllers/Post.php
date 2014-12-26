<?php

namespace main\controllers;

use system\core\Controller;

class Post extends Controller
{   
    public function index($permalink)
    {
        echo 'post : '.$permalink;
    }
} 