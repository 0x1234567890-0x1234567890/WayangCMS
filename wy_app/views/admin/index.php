<?php $router = WY_Registry::get('router'); ?>
<!DOCTYPE html>
<!--
    Copyright 2013 root <root@wayang-cms.org>

    This program is free software; you can redistribute it and/or
    modify it under the terms of the GNU General Public License
    as published by the Free Software Foundation; either version 2
    of the License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
-->
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $this->pageTitle; ?></title>
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!-- Page-Level Plugin CSS - Dashboard 
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">-->
    <!-- Page-Level Plugin CSS - Tables -->
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/sb-admin.css" rel="stylesheet">
    <!-- ckeditor have to load first -->
    <script type="text/javascript" src="<?php echo WY_Request::base_url(); ?>/assets/admin/ckeditor/ckeditor.js"></script>
    <!-- Bootstrap tags input -->
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/bootstrap-tagsinput.css" rel="stylesheet">
    
</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $router->generate('admin-home'); ?>">Wayang CMS Administration</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Welcome Admin <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $router->generate('admin-logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo $router->generate('admin-home'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Pages<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $router->generate('admin-pages'); ?>"> All Pages</a>
                                </li>
                                <li>
                                    <a href="<?php echo $router->generate('admin-pages-add'); ?>"> Add New Page</a>
                                </li>
                            </ul>
                            
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Posts <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $router->generate('admin-posts'); ?>"> All Post</a>
                                </li>
                                <li>
                                    <a href="<?php echo $router->generate('admin-posts-add'); ?>"> Add New Post</a>
                                </li>
                                <li>
                                    <a href="#"> Category <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo $router->generate('admin-categories'); ?>"> All Categories</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $router->generate('admin-categories-add'); ?>"> Add New Category</a>
                                        </li>
                                    </ul>
                                </li>
                                <!--<li>
                                    <a href="<?php echo $router->generate('admin-comments'); ?>"> Comments</a>
                                </li>-->
                            </ul>
                        </li>
                        <!--<li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Preferences <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#"> Themes Preferences <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo $router->generate('admin-themes'); ?>"> All Themes</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $router->generate('admin-themes-add'); ?>"> Add New Themes</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#"> Plugins Preferences <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="<?php echo $router->generate('admin-plugins'); ?>"> All Plugins</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo $router->generate('admin-plugins-add'); ?>"> Add New Plugin</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="<?php echo $router->generate('admin-prefs'); ?>"> Sites Preferences</a>
                                </li>
                            </ul>
                        </li>-->
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $router->generate('admin-users'); ?>"> All Users</a>
                                </li>
                                <li>
                                    <a href="<?php echo $router->generate('admin-users-add'); ?>"> Add New User</a>
                                </li>
                                <li>
                                    <a href="<?php echo $router->generate('admin-users-level'); ?>"> User Levels</a>
                                </li>
                                <li>
                                    <a href="<?php echo $router->generate('admin-users-profile'); ?>"> Profiles</a>
                                </li>
                            </ul>
                            
                        </li>
                        
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php echo $content; ?>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/bootstrap-tagsinput.min.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    
    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/sb-admin.js"></script>
    <!-- Page-Level Demo Scripts - Dashboard - Use for reference  
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/demo/dashboard-demo.js"></script>
    <!-- Page-Level Plugin Scripts - Dashboard 
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/morris/morris.js"></script> -->  
     <!-- Page-Level Plugin Scripts - Tables -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    

    <script>
        /*
         * Datatables
         */
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
        /*
         * Bootstrap Tags Input
         */
    </script>
</body>

</html>
