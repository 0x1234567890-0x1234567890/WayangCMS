            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Users</a>
                        <a class="current"><span class="badge badge-inverse"></span> All Users</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            All Users
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Date Registered</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = 1; ?>
                                        <?php foreach($user as $u): ?>
                                        <tr class="<?php if($row % 2 == 0) echo 'even'; else echo 'odd'; $row++; ?> gradeX">
                                            <td><?php echo $u->display_name; ?></td>
                                            <td><?php echo $u->email; ?></td>
                                            <td><?php echo $u->date_registered; ?></td>
                                            <th>
                                                <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo WY_Registry::get('router')->generate('admin-users-edit', array('id'=>$u->user_id)); ?>"><span class="glyphicon glyphicon-pencil"></a>
                                                <a class="btn btn-danger btn-sm" title="Edit" href="<?php echo WY_Registry::get('router')->generate('admin-users-delete', array('id'=>$u->user_id)); ?>"><span class="glyphicon glyphicon-trash"></a>
                                            </th>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->