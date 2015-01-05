<?php

namespace main\components;

use system\core\Widget;
use system\core\Registry;
use system\core\helpers\Url;

class Menu extends Widget
{
    public function init()
    {
        parent::init();
        
        $db = Registry::getDb();
        
        $this->menuItems = $db->query('select title, permalink from wy_page');
    }
    
	public function run()
    {
        $html = '<ul>';
        foreach ($this->menuItems as $menu) {
            $url = Url::to(array('page/view', 'permalink' => $menu->permalink));
            $html .= "<li><a href='{$url}'>{$menu->title}</a></li>";
        }
        $html .= '</ul>';
        
        return $html;
    }
}
