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
    // install section
    array('GET', '/install', ':install:index', 'install'),
    array('POST','/install/step/[*:id]', ':install:step', 'install-step'),
    array('POST','/install/step/run', ':install:run', 'install-run'),
    //index home section
    array('GET', '/', ':home:index', 'home'),
    // admin home section
    array('GET', '/admin', 'admin:home:index', 'admin-home'),
    // admin login/logout
    array('GET','/login', 'admin:login:index', 'admin-login'),
    array('POST','/login', 'admin:login:login', 'admin-login-process'),
    array('GET','/logout', 'admin:login:logout', 'admin-logout'),
    array('GET|POST','/login/reset', 'admin:login:forgot', 'admin-reset-password'),
    array('GET|POST','/login/reset/[*:activation]', 'admin:login:newpwd', 'admin-new-password'),
    //user register section
    array('GET|POST', '/register', ':register:index', 'register'),
    // admin pages section
    array('GET', '/admin/pages/all', 'admin:page:all', 'admin-pages'),
    array('GET|POST', '/admin/pages/add', 'admin:page:add', 'admin-pages-add'),
    array('GET|POST', '/admin/pages/edit/[i:id]', 'admin:page:edit', 'admin-pages-edit'),
    array('GET', '/admin/pages/delete/[i:id]', 'admin:page:delete', 'admin-pages-delete'),
    // admin posts section
    array('GET', '/admin/posts/all', 'admin:post:all', 'admin-posts'),
    array('GET|POST', '/admin/posts/add', 'admin:post:add', 'admin-posts-add'),
    array('GET|POST', '/admin/posts/edit/[i:id]', 'admin:post:edit', 'admin-posts-edit'),
    array('GET', '/admin/posts/delete/[i:id]', 'admin:post:delete', 'admin-posts-delete'),
    // admin categories section
    array('GET', '/admin/categories/all', 'admin:category:all', 'admin-categories'),
    array('GET|POST', '/admin/categories/add', 'admin:category:add', 'admin-categories-add'),
    array('GET|POST', '/admin/categories/edit/[i:id]', 'admin:category:edit', 'admin-categories-edit'),
    array('GET', '/admin/categories/delete/[i:id]', 'admin:category:delete', 'admin-categories-delete'),
    // admin comments section
    array('GET', '/admin/comments/all', 'admin:comment:all', 'admin-comments'),
    array('GET|POST', '/admin/comments/edit/[i:id]', 'admin:comment:edit', 'admin-comments-edit'),
    array('GET', '/admin/comments/delete/[i:id]', 'admin:comment:delete', 'admin-comments-delete'),
    // admin themes section
    array('GET', '/admin/themes/all', 'admin:theme:all', 'admin-themes'),
    array('GET|POST', '/admin/themes/add', 'admin:theme:add', 'admin-themes-add'),
    array('GET', '/admin/themes/delete/[i:id]', 'admin:theme:delete', 'admin-themes-delete'),
    // admin plugins section
    array('GET', '/admin/plugins/all', 'admin:plugin:all', 'admin-plugins'),
    array('GET|POST', '/admin/plugins/add', 'admin:plugin:add', 'admin-plugins-add'),
    array('GET', '/admin/plugins/delete/[i:id]', 'admin:plugin:delete', 'admin-plugins-delete'),
    // admin preferences section
    array('GET', '/admin/prefs/all', 'admin:pref:all', 'admin-prefs'),
    array('GET|POST', '/admin/prefs/add', 'admin:pref:add', 'admin-prefs-add'),
    array('GET|POST', '/admin/prefs/edit/[i:id]', 'admin:pref:edit', 'admin-prefs-edit'),
    array('GET', '/admin/prefs/delete/[i:id]', 'admin:pref:delete', 'admin-prefs-delete'),
    // admin users section
    array('GET', '/admin/users/all', 'admin:user:all', 'admin-users'),
    array('GET|POST', '/admin/users/add', 'admin:user:add', 'admin-users-add'),
    array('GET|POST', '/admin/users/edit/[i:id]', 'admin:user:edit', 'admin-users-edit'),
    array('GET', '/admin/users/delete/[i:id]', 'admin:user:delete', 'admin-users-delete'),
    // admin users level section
    array('GET', '/admin/users/level', 'admin:user:level', 'admin-users-level'),
    array('GET|POST', '/admin/users/level', 'admin:user:level_add', 'admin-users-level-add'),
    array('GET|POST', '/admin/users/level/[i:id]', 'admin:user:level_edit', 'admin-users-level-edit'),
    array('GET|POST', '/admin/users/level/[i:id]', 'admin:user:level_delete', 'admin-users-level-delete'),
    array('GET', '/admin/users/profile', 'admin:user:profile', 'admin-users-profile'),
    // view page/post/ section
    array('GET', '/page/[*:permalink]', ':page:index', 'page'),
    array('GET', '/post/[*:permalink]', ':post:index', 'post'),
    //adding comment into post/page section
    array('POST', '/post/[*:permalink]', ':comment:add', 'comment'),
);