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
        <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
        <!-- Favicons
            ================================================== -->
        <link rel="shortcut icon" href="<?php echo WY_Request::base_url(); ?>/assets/images/icon.ico">
        <link rel="apple-touch-icon" href="<?php echo WY_Request::base_url(); ?>/assets/images/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo WY_Request::base_url(); ?>/assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo WY_Request::base_url(); ?>/assets/images/apple-touch-icon-114x114.png">
        <!-- JS
            ================================================== -->
        <script src="<?php echo WY_Request::base_url(); ?>/assets/theme/js/jquery.js" type="text/javascript"></script>
        <script src="<?php echo WY_Request::base_url(); ?>/assets/theme/js/bootstrap.js" type="text/javascript"></script>
        <script src="<?php echo WY_Request::base_url(); ?>/assets/theme/js/styles.js" type="text/javascript"></script>
    </head>
    <body class="home">
        <div class="navbar navbar-default navbar-fixed-top contnav">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Active</a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Dropdown header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="navbar-form navbar-left">
                    <input type="text" class="form-control col-lg-8" placeholder="Search">
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </div>
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
                            <div class="item">
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
                            <div class="item active">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="jumbotron box-wide">
                        <h2>Jumbotron</h2>
                        <p >This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <p><a class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-globe"></span> Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="main">
                <!-- Articles -->
                
                <?php echo $content; ?>
                
                <div class="row col-lg-4 sidebar">
                    <div class="alert alert-dismissable alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Well done!</strong> You successfully read <a href="#" class="alert-link">this important alert message</a>.
                    </div>
                    <h2>Labels</h2>
                    <div class="bs-example" style="margin-bottom: 20px;border-bottom: 1px solid #dddddd;padding-bottom:25px;">
                        <span class="label label-default">Default</span>
                        <span class="label label-primary">Primary</span>
                        <span class="label label-success">Success</span>
                        <span class="label label-warning">Warning</span>
                        <span class="label label-danger">Danger</span>
                        <span class="label label-info">Info</span>
                        <span class="label label-primary">Primary</span>
                        <span class="label label-success">Success</span>
                        <span class="label label-warning">Warning</span>
                        <span class="label label-danger">Danger</span>
                        <span class="label label-info">Info</span>
                    </div>
                    <div class="media recent-post">
                        <h2>Recent Post</h2>
                        <a href="#" class="pull-left">
                        <img src="http://lorempixel.com/64/64/" class="media-object">
                        </a>
                        <div class="media-body post-recent" contenteditable="false">
                            <h4 class="media-heading">Nested media heading</h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                        </div>
                        <a href="#" class="pull-left">
                        <img src="http://lorempixel.com/64/64/" class="media-object">
                        </a>
                        <div class="media-body post-recent" contenteditable="false">
                            <h4 class="media-heading">Nested media heading</h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                        </div>
                        <a href="#" class="pull-left">
                        <img src="http://lorempixel.com/64/64/" class="media-object">
                        </a>
                        <div class="media-body post-recent" contenteditable="false">
                            <h4 class="media-heading">Nested media heading</h4>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                        </div>
                    </div>
                    <h2>List Item</h2>
                    <div class="list-group">
                        <a href="#" class="list-group-item active">
                        Cras justo odio
                        </a>
                        <a href="#" class="list-group-item">Dapibus ac facilisis in
                        </a>
                        <a href="#" class="list-group-item">Morbi leo risus
                        </a>
                    </div>
                </div>
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
                                Jakarta, ID 12301<br />
                                Jl.M.H Thamrin<br />
                                Phone: +0 000 000 00 00<br />
                                Fax: +0 000 000 00 00<br />
                                Email: <a href="#">admin@wayang-cms.com</a>
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
                            <p>Enter your e-mail below to subscribe to our free newsletter.<br />We promise not to bother you often!</p>
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
                        <p>&copy; Wayang CMS 2013. <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>