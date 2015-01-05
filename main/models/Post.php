<?php

namespace main\models;

use system\core\Model;

class Post extends Model
{
	public static function getAll()
    {
        return self::db()->query('select * from wy_post where published=1 order by date_add desc');
    }
}