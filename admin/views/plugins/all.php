            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Preferences</a>
                        <a><span class="badge"></span> Plugins Preferences</a>
                        <a class="current"><span class="badge badge-inverse"></span> All Plugins</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            All Categories
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Plugin Name</th>
                                            <th>Active</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = 1; ?>
                                        <?php foreach($plugins as $p): ?>
                                        <tr class="<?php if($row % 2 == 0) echo 'even'; else echo 'odd'; $row++; ?> gradeX">
                                            <td><?php echo $p->plugin_name; ?></td>
                                            <td><?php echo $p->is_active ? 'Yes' : 'No'; ?></td>
                                            <th>
                                                <?php
                                                if($p->is_active===1)
                                                { ?>
                                                <a class="btn btn-primary btn-sm" title="Activate"><span class="glyphicon glyphicon-ok-sign"></a>
                                                <a class="btn btn-primary btn-sm" title="Deactivate" href="<?php echo WY_Registry::get('router')->generate('admin-plugins-deact', array('id'=>$p->plugin_id)); ?>"><span class="glyphicon glyphicon-off"></a>
                                                <?php }
                                                else
                                                { ?>
                                                <a class="btn btn-primary btn-sm" title="Activate" href="<?php echo WY_Registry::get('router')->generate('admin-plugins-act', array('id'=>$p->plugin_id)); ?>"><span class="glyphicon glyphicon-ok-sign"></a>
                                                <a class="btn btn-primary btn-sm" title="Deactivate"><span class="glyphicon glyphicon-off"></a>
                                                <?php }
                                                ?>
                                                <a class="btn btn-danger btn-sm" title="Delete" href="<?php echo WY_Registry::get('router')->generate('admin-plugins-delete', array('id'=>$p->plugin_id)); ?>"><span class="glyphicon glyphicon-trash"></a>
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