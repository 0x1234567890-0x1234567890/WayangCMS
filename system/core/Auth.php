<?php

namespace system\core;

use system\core\Base as Base;

/**
 * Kelas ini berfungsi untuk keperluan otentifikasi dan otorisasi pengguna sistem
 */
class Auth extends Base
{
    protected $db;
    protected $session;
    
    /**
     * Melakukan proses login ke sistem
     * @param string $username username yang mau di-check
     * @param string $password password yang mau di-check
     * @return boolean true bila login sukses, false jika login gagal
     */
	public function login($username, $password)
    {
        $user = $this->db->query("select * from wy_users where username = :username and pass = :password", array(
            ':username' => $username,
            ':password' => $password,
        ));
        
        if($user){ // login sukses
            $this->session->set('authenticated', true);
            $this->session->set('user_id', $user->user_id);
            $this->session->set('user_name', $user->username);
            $this->session->set('display', $user->display_name);
            return true;
        }else{ // login gagal
            $this->session->set_flash('error', 'Invalid username or password');
            return false;
        }
    }
    
    /**
     * Melakukan proses registrasi pengguna ke sistem
     * @return boolean
     */
    public function register()
    {
        
    }
    
    /**
     * Memeriksa apakah pengguna saat ini telah ter-otentikasi dengan benar
     * @return boolean
     */
    public function is_authenticated()
    {
        return $this->session->get('authenticated', false);
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