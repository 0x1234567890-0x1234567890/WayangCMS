<?php $router = WY_Registry::get('router'); ?>
<div class="login-panel panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Sign In</h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="" enctype="multipart/form-data" >
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                </div>
                <div class="checkbox">
                    <label>
                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                    </label>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button type="submit" class="btn btn-lg btn-success btn-block">Login Now</button>
                <a href="<?php echo $router->generate('admin-reset-password'); ?>" >Forgot Password ?</a>
            </fieldset>
        </form>
    </div>
</div>
