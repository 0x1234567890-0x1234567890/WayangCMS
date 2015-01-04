<?php

namespace main\controllers;

use system\core\Controller;

class Comment extends Controller
{
    public $layout = "themes/default/layout";
    
    public function add()
    {
        if(WY_Request::isPost()){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $url = $_POST['url'];
            $permalink = $_POST['p'];
            // $captcha = $_POST['captcha'];
            $content = $_POST['message'];
            if(isset($_POST['postid']))
            {
                $post_id = $_POST['postid'];
                WY_Db::execute('INSERT INTO `wy_comments`(`name`, `email`, `url`, `date`, `content`, `post_id`, `ip`) '
                        . 'VALUES (:name,:email,:url,NOW(),:content,:post_id,"'.$_SERVER['REMOTE_ADDR'].'")', array(
                        ':name'=>$name,
                        ':email'=>$email,
                        ':url'=>$url,
                        ':content'=> htmlspecialchars($content),
                        ':post_id'=> $post_id,
                        ));
                WY_Response::redirect('post/'.$permalink);
            }
            else
            {
                $page_id = $_POST['pageid'];
                WY_Db::execute('INSERT INTO `wy_comments`(`name`, `email`, `url`, `date`, `content`, `page_id`, `ip`) VALUES (:name,:email,:url,NOW(),:content,:page_id,'.$_SERVER['REMOTE_ADDR'].')', array(
                        ':name'=>$name,
                        ':email'=>$email,
                        ':url'=>$url,
                        ':content'=>  htmlspecialchars($content),
                        ':page_id'=> $post_id,
                        ));
                WY_Response::redirect('page/'.$permalink);
            }
        }
        $this->layout->pageTitle = 'Wayang CMS - Add Category';
        $this->layout->content = WY_View::fetch('admin/categories/new');
    }
    
    public function view($id)
    {
        //for ajax
        $this->layout->content = WY_View::fetch('themes/default/comment');
    }
} 