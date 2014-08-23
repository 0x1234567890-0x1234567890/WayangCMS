<?php
session_start();

define('BASEPATH', __DIR__);
define('DEBUG', TRUE);

require 'wy_config/autoload.php';

$wyBootstrap = new WY_Bootstrap;

$wyBootstrap->run();