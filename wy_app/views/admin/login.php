
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

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <?php echo $content; ?>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/jquery-1.10.2.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/bootstrap.min.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/sb-admin.js"></script>
</body>

</html>
