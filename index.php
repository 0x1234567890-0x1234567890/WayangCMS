<?php

define('BASEPATH', __DIR__);
define('DEBUG', TRUE);

require 'system/core/Core.php';
system\core\Core::init();

$registry = new system\core\Registry();

$registry['config'] = $registry->share(function($r){
    return new system\core\Config();
});

$registry['db'] = $registry->share(function($r){
    return new system\core\Database(array('registry'=>$r));
});





