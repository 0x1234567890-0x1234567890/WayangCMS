<?php

return array(
    array('GET', '/', ':page:index', 'home'),
    array('GET', '/install', ':install:index', 'install'),
    array('GET', '/admin', 'admin:home:index', 'admin-home'),
    array('GET', '/admin/pages/all', 'admin:page:all', 'admin-pages'),
    array('GET', '/[a:name]', ':page:view', 'page'),
);