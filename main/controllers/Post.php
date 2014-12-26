<?php

namespace application\controllers;

use system\core\Controller as Controller;

class Post extends Controller
{   
    public function index($permalink)
    {
        echo 'post : '.$permalink;
    }
} 