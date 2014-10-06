<?php

session_start();

define('BASEPATH', __DIR__);
define('DEBUG', TRUE);

require 'system/core/Base.php';
require 'system/core/Database.php';
require 'system/core/db/Query.php';
require 'system/core/db/query/Mysql.php';

$database = new wayang\Database(array(
    'type' => 'mysql',
    'username' => 'root',
    'password' => '',
    'host' => 'localhost',
    'port' => '3306',
    'schema' => 'wayang',
));

$database->connect();

$categories = $database->query()
    ->from('wy_category')
    ->count();
    
echo "<pre>";
print_r($categories);
echo "</pre>";