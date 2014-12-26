<?php $router = WY_Registry::get('router'); ?>
<div class="login-panel panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title">Forgot Password</h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="" enctype="multipart/form-data" >
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button type="submit" class="btn btn-lg btn-primary btn-block">Send New Password</button>
                <h5><a href="<?php echo $router->generate('admin-login'); ?>" >Back to Login page</a></h5>
            </fieldset>
        </form>
    </div>
</div>
