<?php $router = WY_Registry::get('router'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-wrench fa-fw"></i>Run Run Run Installation....
        </h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="<?php echo $router->generate('install-run');?>" enctype="multipart/form-data" >
            <div class="col-md-10 col-md-offset-1">
                <p style="text-align: center"><i class="fa fa-check fa-fw"></i>All data completed, run installation now?</p>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-md btn-primary btn-block">Run Install</button>
            </div>
        </form>
    </div>
</div>
