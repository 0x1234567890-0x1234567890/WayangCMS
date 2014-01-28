<?php
define('BASEPATH', __DIR__);
define('DEBUG', TRUE);

require_once 'wy_files/confs/autoload.php';

$wyBootstrap = new WY_Bootstrap;

$wyBootstrap->run();