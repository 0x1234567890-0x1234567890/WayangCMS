<?php

class WY_Auth
{
	public static function login($username, $password)
    {
        $user = WY_Db::row("select * from user where user_name = :username and user_pass = :password", array(
            ':username' => $username,
            ':password' => $password,
        ));
        
        if($user){
            WY_Session::set('authenticated', true);
            WY_Session::set('user_id', $user['user_id']);
            WY_Session::set('user_name', $user['user_name']);
            return true;
        }else{
            WY_Session::set_flash('error', 'Invalid username or password');
            return false;
        }
    }
    
    public static function register()
    {
        
    }
    
    public static function is_authenticated()
    {
        return WY_Session::get('authenticated', false);
    }
    
    public static function has_role($role)
    {
        
    }
}