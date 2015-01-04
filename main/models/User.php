<?php

namespace main\models;

use system\core\Model;

class User extends Model
{
	public static function getAll()
    {
        return self::db()->query('select * from wy_user');
    }
}