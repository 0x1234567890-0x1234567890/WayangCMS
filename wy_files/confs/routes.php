<?php

return array(
    array('GET', '/', array('c'=>'PageController', 'a'=>'index'), 'home'),
    array('GET', '/install', array('c'=>'InstallController', 'a'=>'index'), 'install'),
);