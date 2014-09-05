<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $this->pageTitle; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS
            ================================================== -->
        <link rel="stylesheet" href="<?php echo WY_Request::base_url(); ?>/assets/theme/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo WY_Request::base_url(); ?>/assets/theme/css/styles.css">
        <link rel="stylesheet" href="<?php echo WY_Request::base_url(); ?>/assets/admin/css/sb-admin.css">
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
        <link href="<?php echo WY_Request::base_url(); ?>/assets/theme/css/font-awesome.min.css" rel="stylesheet">
        <!-- Favicons
            ================================================== -->
        <link rel="shortcut icon" href="<?php echo WY_Request::base_url(); ?>/assets/images/icon.ico">
        <link rel="apple-touch-icon" href="<?php echo WY_Request::base_url(); ?>/assets/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo WY_Request::base_url(); ?>/assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo WY_Request::base_url(); ?>/assets/images/apple-touch-icon-114x114.png">
        
    </head>
    <body class="home">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
        <!-- JS
            ================================================== -->
        <script src="<?php echo WY_Request::base_url(); ?>/assets/theme/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo WY_Request::base_url(); ?>/assets/theme/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo WY_Request::base_url(); ?>/assets/theme/js/extra.js" type="text/javascript"></script>
    </body>
</html>