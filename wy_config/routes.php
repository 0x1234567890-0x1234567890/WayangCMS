<?php

/* Konfigurasi url untuk routing */


/**
 * format : 
 * method (GET, POST, PUT, DELETE)
 * pattern (regex)
 * target format (<module>:<controller>:<action>) *<module> optional
 * name nama dari rules *optional
 */
return array(
    array('GET', '/', ':page:index', 'home'),
    array('GET', '/install', ':install:index', 'install'),
    array('GET', '/admin', 'admin:home:index', 'admin-home'),
    array('GET', '/admin/pages/all', 'admin:page:all', 'admin-pages'),
    array('GET', '/[*:permalink]', ':page:view', 'page'),
);