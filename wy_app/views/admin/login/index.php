<?php $router = WY_Registry::get('router'); ?>
<div class="clearfix">
        <div class="col-md-6 col-md-offset-3">
            <img src="<?php echo WY_Request::base_url(); ?>/assets/images/logo.png" class="img-responsive" width="100%"/>
        </div>
</div>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Sign In</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="<?php echo $router->generate('admin-login-process') ?>">
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <input class="form-control" placeholder="Username" name="username" type="text" autofocus>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="checkbox">
                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-8 col-lg-offset-2">
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                    <!--<a href="<?php echo $router->generate('register') ?>" class="btn btn-lg btn-primary btn-block">Register</a>-->
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-11 col-lg-offset-1">
                    <a href="<?php echo $router->generate('admin-reset-password'); ?>" class="btn btn-sm btn-warning" ><span class="glyphicon glyphicon-question-sign"> Forgot Password</a>
                    <a href="<?php echo $router->generate('home'); ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-globe"> Go to Website</a>
                </div>
            </div>
        </form>
        <?php
        if(WY_Session::has_flash('error'))
        {
            ?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo WY_Session::get_flash('error');?>
            </div>
        <?php
        }
        ?>
    </div>
</div>
