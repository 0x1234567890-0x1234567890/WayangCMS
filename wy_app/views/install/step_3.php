<?php $router = WY_Registry::get('router'); ?>
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">
            <i class="fa fa-globe fa-fw"></i>Website Configuration
        </h3>
    </div>
    <div class="panel-body">
        <form role="form" method="POST" action="<?php echo $router->generate('install-step', array('id'=>3));?>" enctype="multipart/form-data" >
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Website Name</label>
                    <div class="form-group col-md-8">
                        <input type="text" id="wname" name="wname" class="form-control" required placeholder="Website Name"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Website URL</label>
                    <div class="form-group col-md-8">
                        <input type="url" id="wurl" name="wurl" class="form-control" required placeholder="Website URL"/>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12">
                    <label class="col-md-4 control-label">Enable Side Bar</label>
                    <div class="form-group col-md-8">
                        <select name="wside" id="wside" class="form-control" required>
                            <option value="enable">Enable</option>
                            <option value="disable">Disable</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <button type="submit" class="btn btn-md btn-primary btn-block">Check Data</button>
            </div>
        </form>
    </div>
</div>
