<?php

ORM::configure('mysql:host=localhost;dbname=wayang');
ORM::configure('username', 'root');
ORM::configure('password', '');

ORM::configure('logging', true);
ORM::configure('return_result_sets', true);
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));