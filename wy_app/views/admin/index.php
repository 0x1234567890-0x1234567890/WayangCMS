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
    <link href="<?php echo WY_Request::base_url(); ?>/assets/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo WY_Request::base_url(); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/plugins/timeline/timeline.css" rel="stylesheet">
    <!-- Page-Level Plugin CSS - Tables -->
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/sb-admin.css" rel="stylesheet">
    <!-- ckeditor have to load first -->
    <script type="text/javascript" src="<?php echo WY_Request::base_url(); ?>/assets/admin/ckeditor/ckeditor.js"></script>

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $router->generate('admin-home'); ?>">Wayang CMS Administration</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?php echo $router->generate('admin-home'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Pages<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $router->generate('admin-pages-add'); ?>">Add New Page</a>
                            </li>
                            <li>
                                <a href="<?php echo $router->generate('admin-pages'); ?>">All Pages</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-edit fa-fw"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $router->generate('admin-posts-add'); ?>">Add New Post</a>
                            </li>
                            <li>
                                <a href="<?php echo $router->generate('admin-posts'); ?>">All Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo $router->generate('admin-categories'); ?>">Categories</a>
                            </li>
                            <li>
                                <a href="<?php echo $router->generate('admin-comments'); ?>">Comments</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> Preferences<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Themes<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo $router->generate('admin-themes-add'); ?>">Add New Themes</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $router->generate('admin-themes'); ?>">All Themes</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                            <li>
                                <a href="#">Plugins<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo $router->generate('admin-plugins-add'); ?>">Add New Plugin</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $router->generate('admin-plugins'); ?>">All Plugins</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                            <li>
                                <a href="<?php echo $router->generate('admin-prefs'); ?>">Site Preferences</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $router->generate('admin-users-add'); ?>">Add New Users</a>
                            </li>
                            <li>
                                <a href="<?php echo $router->generate('admin-users'); ?>">All Users</a>
                            </li>
                            <li>
                                <a href="<?php echo $router->generate('admin-users-level'); ?>">Levels</a>
                            </li>
                            <li>
                                <a href="<?php echo $router->generate('admin-users-profile'); ?>">Profile</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        <div id="page-wrapper">
            
            
            <?php echo $content; ?>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/jquery-1.10.2.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/bootstrap.min.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
        <!-- Page-Level Plugin Scripts - Tables -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/sb-admin.js"></script>

    
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>
