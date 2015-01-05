<?php

namespace main\components;

use system\core\Widget;
use system\core\Registry;
use system\core\helpers\Url;

class Sidebar extends Widget
{
    public function init()
    {
        parent::init();
        
        $db = Registry::getDb();
        
        $this->recentPosts = $db->query('select * from wy_post where published=1 order by date_add');
        
        $this->categories = $db->query('select * from wy_category where published=1 order by date_add');
    }
    
	public function run()
    {
        return $this->render('sidebar', array(
            'recentPosts' => $this->recentPosts,
            'categories' => $this->categories,
        ));
    }
}