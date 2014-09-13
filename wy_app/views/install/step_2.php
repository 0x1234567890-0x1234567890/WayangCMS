<?php $router = WY_Registry::get('router'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-user fa-fw"></i>System Administration
        </h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="<?php echo $router->generate('install-step', array('id'=>2));?>" enctype="multipart/form-data" >
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Username</label>
                    <div class="form-group col-md-8">
                        <input type="text" id="username" name="username" class="form-control" required placeholder="Username"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Password</label>
                    <div class="form-group col-md-8">
                        <input type="password" id="password" name="password" class="form-control" required placeholder="Password"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Email</label>
                    <div class="form-group col-md-8">
                        <input type="email" id="email" name="email" class="form-control" required placeholder="Email"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Display Name</label>
                    <div class="form-group col-md-8">
                        <input type="text" id="display" name="display" class="form-control" required placeholder="Display Name"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">URL</label>
                    <div class="form-group col-md-8">
                        <input type="url" id="url" name="url" class="form-control" placeholder="Url"/>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-md btn-primary btn-block">Go to Step 3</button>
            </div>
        </form>
    </div>
</div>
