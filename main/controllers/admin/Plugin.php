<?php

namespace application\controllers\admin;

use system\core\Controller as Controller;

class Plugin extends Controller
{
    public $layout = 'admin/index';
    
    public static function auth()
    {
        if(!WY_Auth::is_authenticated())
        {
            WY_Response::redirect('login');
        }   
    }
    
    public function all()
    {
        self::auth();
        $plugins = WY_Db::all('SELECT * FROM `wy_plugins` ORDER BY `is_active` DESC');
        $this->layout->pageTitle = 'Wayang CMS - Plugins';
        $this->layout->content = WY_View::fetch('admin/plugins/all', array('plugins'=>$plugins));
    }
    
    public function add()
    {
        
        self::auth();
    }
    
    public function activate($id)
    {
        self::auth();
        WY_Db::execute('UPDATE wy_plugins SET is_active = 1 WHERE plugin_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/plugins/all');
    }
    public function deactivate($id)
    {
        self::auth();
        WY_Db::execute('UPDATE wy_plugins SET is_active = 0 WHERE plugin_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/plugins/all');
    }
    public function delete($id)
    {
        self::auth();
        WY_Db::execute('DELETE FROM wy_plugins WHERE plugin_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/plugins/all');
    }
}
