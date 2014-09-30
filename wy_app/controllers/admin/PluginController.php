<?php

class PluginController extends WY_TController
{
	public $layout = 'admin/index';
	
    public function all()
    {
        $plugins = WY_Db::all('SELECT * FROM `wy_plugins` ORDER BY `is_active` DESC');
        $this->layout->pageTitle = 'Wayang CMS - Plugins';
        $this->layout->content = WY_View::fetch('admin/plugins/all', array('plugins'=>$plugins));
    }
    
    public function add()
    {
        
    }
    
    public function activate($id)
    {
        WY_Db::execute('UPDATE wy_plugins SET is_active = 1 WHERE plugin_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/plugins/all');
    }
    public function deactivate($id)
    {
        WY_Db::execute('UPDATE wy_plugins SET is_active = 0 WHERE plugin_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/plugins/all');
    }
    public function delete($id)
    {
        WY_Db::execute('DELETE FROM wy_plugins WHERE plugin_id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/plugins/all');
    }
}
