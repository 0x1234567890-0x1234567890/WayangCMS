            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Users</a>
                        <a href="<?php echo WY_Registry::get('router')->generate('admin-users');?>"><span class="badge"></span> All Users</a>
                        <a class="current"><span class="badge badge-inverse"></span> New</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            New User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- CKEDITOR and FORM HERE -->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Display Name</label>
                                            <input type="text" id="display" name="display" placeholder="Display Name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>URL</label>
                                            <input type="text" id="url" name="url" placeholder="URL" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="level" id="level">
                                                <option>Member</option>
                                                <option>Admin</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-info">Save User</button>
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