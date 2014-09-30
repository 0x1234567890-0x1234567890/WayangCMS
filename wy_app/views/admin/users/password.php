            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Users</a>
                        <a href="<?php echo WY_Registry::get('router')->generate('admin-users');?>"><span class="badge"></span> All Users</a>
                        <a class="current"><span class="badge badge-inverse"></span> Change Password</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Change Password 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- CKEDITOR and FORM HERE -->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" id="username" name="username" value="<?php echo $user->username ;?>" placeholder="Username" class="form-control" readonly="readonly">
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <input type="password" id="npassword" name="npassword" value="" placeholder="New Password" class="form-control" required="required">
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password </label><span id="error" class="label label-danger"></span>
                                            <input type="password" id="cpassword" name="cpassword" value="" placeholder="Confirm Password" class="form-control" required="required">
                                        </div>
                                        <button id="submit" type="submit" class="btn btn-info">Save Password</button>
                                        <button type="reset" class="btn btn-warning">Reset Form</button>
                                    </form>
                                </div>
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>
            <!-- /.row -->