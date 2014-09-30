<?php $router = WY_Registry::get('router'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-database fa-fw"></i>Database Configuration
        </h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="<?php echo $router->generate('install-step', array('id'=>1));?>" enctype="multipart/form-data" >
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Database Host</label>
                    <div class="form-group col-md-8">
                        <input type="text" id="dbhost" name="dbhost" class="form-control" required placeholder="Database Host"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Database Name</label>
                    <div class="form-group col-md-8">
                        <input type="text" id="dbname" name="dbname" class="form-control" required placeholder="Database Name"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Database User</label>
                    <div class="form-group col-md-8">
                        <input type="text" id="dbuser" name="dbuser" class="form-control" required placeholder="Database User"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Database Password</label>
                    <div class="form-group col-md-8">
                        <input type="text" id="dbpass" name="dbpass" class="form-control" placeholder="Database Password"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-md btn-primary btn-block">Go to Step 2</button>
            </div>
        </form>
    </div>
</div>
