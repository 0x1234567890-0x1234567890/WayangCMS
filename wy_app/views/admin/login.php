<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $this->pageTitle; ?></title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo WY_Request::base_url(); ?>/assets/admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    

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
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/jquery-1.10.2.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/bootstrap.min.js"></script>
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo WY_Request::base_url(); ?>/assets/admin/js/sb-admin.js"></script>

</body>

</html>
