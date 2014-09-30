<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>
        <?php echo $this->pageTitle; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS
            ================================================== -->
    <link rel="stylesheet" href="<?php echo WY_Request::base_url(); ?>/assets/theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo WY_Request::base_url(); ?>/assets/theme/css/styles.css">
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
    <?php echo $menu; ?>
    <div class="container wrapslid">
        <div class="row">
            <div class="col-lg-12">
                <div class="carousel slide" id="carousel-332749">
                    <ol class="carousel-indicators">
                        <li class="" data-slide-to="0" data-target="#carousel-332749"></li>
                        <li data-slide-to="1" data-target="#carousel-332749" class=""></li>
                        <li data-slide-to="2" data-target="#carousel-332749" class="active"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img alt="" src="http://lorempixel.com/1600/500/sports/1">
                            <div class="carousel-caption">
                                <h4>First Thumbnail label</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="" src="http://lorempixel.com/1600/500/sports/2">
                            <div class="carousel-caption">
                                <h4>Second Thumbnail label</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                        </div>
                        <div class="item">
                            <img alt="" src="http://lorempixel.com/1600/500/sports/3">
                            <div class="carousel-caption">
                                <h4>Third Thumbnail label</h4>
                                <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            </div>
                        </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-332749" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-332749" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>
        <div class="main">
            <!-- Articles -->

            <?php echo $content; ?>

            <?php echo $sidebar;?>
        </div>
    </div>
    <!-- Foooter
            ================== -->
    <footer>
        <div class="container">
            <div class="row">
                <!-- Contact Us 
                        =================  -->
                <div class="col-sm-4">
                    <div class="headline">
                        <h3>Contact us</h3>
                    </div>
                    <div class="content">
                        <p>
                            Jakarta, ID 12301
                            <br />Jl.M.H Thamrin
                            <br />Phone: +0 000 000 00 00
                            <br />Fax: +0 000 000 00 00
                            <br />Email: <a href="#">admin@wayang-cms.com</a>
                        </p>
                    </div>
                </div>
                <!-- Social icons 
                        ===================== -->
                <div class="col-sm-4">
                    <div class="headline">
                        <h3>Go Social</h3>
                    </div>
                    <div class="content social">
                        <p>Stay in touch with us:</p>
                        <ul>
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-github"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-vk"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <!-- Subscribe 
                        =============== -->
                <div class="col-sm-4">
                    <div class="headline">
                        <h3>Subscribe</h3>
                    </div>
                    <div class="content">
                        <p>Enter your e-mail below to subscribe to our free newsletter.
                            <br />We promise not to bother you often!</p>
                        <form class="form" role="form">
                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input type="text" class="form-control">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Subscribe</button>
                                            </span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Legal 
            ============= -->
    <div class="legal">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <p>&copy; Wayang CMS 2013. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                    </p>
                </div>
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