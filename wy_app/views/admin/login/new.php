<?php $router = WY_Registry::get('router'); ?>
<div class="login-panel panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title">New Password</h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="" enctype="multipart/form-data" >
            <fieldset>
                <div class="form-group">
                    <input class="form-control" placeholder="New Password" name="nPassword" type="password" autofocus>
                </div>
                <div class="form-group">
                    <input class="form-control" placeholder="Confirm Password" name="cPassword" type="password" autofocus>
                </div>
                <!-- Change this to a button or input when using this as a form -->
                <button type="submit" class="btn btn-lg btn-primary btn-block">Save New Password</button>
                <h5><a href="<?php echo $router->generate('admin-login'); ?>" >Back to Login page</a></h5>
            </fieldset>
        </form>
    </div>
</div>
