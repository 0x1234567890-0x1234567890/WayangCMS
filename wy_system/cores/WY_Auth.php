<?php

/**
 * Kelas ini berfungsi untuk keperluan otentifikasi dan otorisasi pengguna sistem
 */
class WY_Auth
{
    /**
     * Melakukan proses login pada sistem
     * @param string $username username yang mau di-check
     * @param string $password password yang mau di-check
     * @return boolean true bila login sukses, false jika login gagal
     */
	public static function login($username, $password)
    {
        $user = WY_Db::row("select * from wy_user where username = :username and pass = :password", array(
            ':username' => $username,
            ':password' => $password,
        ));
        
        if($user)
        { // login sukses
            WY_Session::set('authenticated', true);
            WY_Session::set('user_id', $user->user_id);
            WY_Session::set('user_name', $user->username);
            return true;
        }
        else
            { // login gagal
            WY_Session::set_flash('error', 'Invalid username or password');
            return false;
        }
    }
    
    /**
     * Melakukan proses registrasi pengguna ke sistem
     * @return boolean
     */
    public static function register()
    {
        
    }
    
    /**
     * Memeriksa apakah pengguna saat ini telah ter-otentikasi dengan benar
     * @return boolean
     */
    public static function is_authenticated()
    {
        return WY_Session::get('authenticated', false);
    }
    
    /**
     * Memeriksa apakah pengguna saat ini mempunyai 'role' tertentu
     * @param string $role role yang akan di-check terhadap pengguna
     * @return boolean
     */
    public static function has_role($role)
    {
        
    }
}