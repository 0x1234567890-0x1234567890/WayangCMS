<?php

class UserController extends WY_TController
{
    public $layout = 'admin/index';
	
    public function all()
    {
        $user = WY_Db::all('SELECT * FROM `wy_users`');
        $this->layout->pageTitle = 'Wayang CMS - Users';
        $this->layout->content = WY_View::fetch('admin/users/all', array('user'=>$user));
    }
    
    public function add()
    {
        if(WY_Request::isPost()){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $display=$_POST['display'];
            $url=$_POST['url'];
            $level=$_POST['level'];
            $password=$_POST['password'];
            WY_Db::execute('INSERT INTO `wy_users` (`username`, `pass`, `email`, `display_name`, `url`, `date_registered`, `status`)'
                    . 'VALUES (:username,:password,:email,:display,:url,NOW(),:level)', array(
                ':username'=>$username,
                ':password'=>sha1($password.WY_Config::get('salt')),
                ':email'=>$email,
                ':display'=>$display,
                ':url'=>$url,
                ':level'=>$level,
                ));
            WY_Response::redirect('admin/users/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Users Add';
        $this->layout->content = WY_View::fetch('admin/users/new');
    }
    
    public function view($id)
    {
        
    }
    
    public function profile($id)
    {
        
    }
    
    public function pwd()
    {
        $user = WY_Db::row('SELECT * FROM `wy_users` WHERE `user_id` = :id', array(':id'=> (int) WY_Session::get('user_id')));
        if(!$user){
            $view = new WY_View('404');
            $view->render();
            exit();
        }
        if(WY_Request::isPost())
        {
            $username=$_POST['username'];
            $npass=$_POST['npassword'];
            $cpass=$_POST['cpassword'];
            $sql="UPDATE `wy_users` SET `pass`=:password WHERE `username`=:username";
            WY_Db::execute($sql, array(
                ':password'=>sha1($npass.WY_Config::get('salt')),
                ':username'=>$username,
                ));
            WY_Response::redirect('admin/users/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Change User Password';
        $this->layout->content = WY_View::fetch('admin/users/password', array('user'=>$user));
    }
    
    public function edit($id)
    {
        $user = WY_Db::row('SELECT * FROM `wy_users` WHERE `user_id` = :id', array(':id'=> (int) $id));
        if(!$user){
            $view = new WY_View('404');
            $view->render();
            exit();
        }
        if(WY_Request::isPost()){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $display=$_POST['display'];
            $url=$_POST['url'];
            $level=$_POST['level'];
            if(isset($_POST['password']) && $_POST['password']==="")
            {
                $sql="UPDATE `wy_users` SET `username`=:username,`email`=:email,`display_name`=:display,`url`=:url,`status`=:level WHERE `user_id`=:id";
                WY_Db::execute($sql, array(
                ':username'=>$username,
                ':email'=>$email,
                ':display'=>$display,
                ':url'=>$url,
                ':level'=>$level,
                ':id'=> (int) $id,
                ));
            }
            else
            {
                $password=$_POST['password'];
                $sql="UPDATE `wy_users` SET `username`=:username,`pass`=:password,`email`=:email,`display_name`=:display,`url`=:url,`status`=:level WHERE `user_id`=:id";
                WY_Db::execute($sql, array(
                ':username'=>$username,
                ':password'=>sha1($password.WY_Config::get('salt')),
                ':email'=>$email,
                ':display'=>$display,
                ':url'=>$url,
                ':level'=>$level,
                ':id'=> (int) $id,
                ));
            }
            
            WY_Response::redirect('admin/users/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Edit User';
        $this->layout->content = WY_View::fetch('admin/users/edit', array('user'=>$user));
    }
    
    public function delete($id)
    {
        WY_Db::execute('DELETE FROM wy_users WHERE user_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/users/all');
    }
}
