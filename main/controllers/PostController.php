<?php

namespace main\controllers;

use system\core\Controller;

class PostController extends Controller
{   
    public function index($permalink)
    {
        echo 'post : '.$permalink;
    }
} 