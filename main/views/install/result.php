<?php $router = WY_Registry::get('router'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-wrench fa-fw"></i>Installation Status ....
        </h3>
    </div>
    <div class="panel-body text-center">
        <h4>Installation Complete</h4>
        <div class="col-md-6 text-right">
            <a href="<?php echo WY_Request::base_url(); ?>" class="btn btn-primary btn-md">Go to Web</a>
        </div>
        <div class="col-md-6 text-left">
            <a href="<?php echo $router->generate('admin-home'); ?>" class="btn btn-primary btn-md">Go to Admin</a>
        </div>
    </div>
</div>