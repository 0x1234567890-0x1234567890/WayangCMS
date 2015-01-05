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
        return $this->render('menu', array(
            'menuItems' => $this->menuItems,
        ));
    }
}
