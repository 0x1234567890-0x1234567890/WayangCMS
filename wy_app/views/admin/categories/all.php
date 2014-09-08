            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Category</a>
                        <a class="current"><span class="badge badge-inverse"></span> All Categories</a>
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
                                            <th>Title</th>
                                            <th>Date Add</th>
                                            <th>Published</th>
                                            <th>Permalink</th>
                                            <th>Date Modified</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = 1; ?>
                                        <?php foreach($categories as $c): ?>
                                        <tr class="<?php if($row % 2 == 0) echo 'even'; else echo 'odd'; $row++; ?> gradeX">
                                            <td><?php echo $c->title; ?></td>
                                            <td><?php echo $c->date_add; ?></td>
                                            <td><?php echo $c->published ? 'Yes' : 'No'; ?></td>
                                            <td><?php echo $c->permalink; ?></td>
                                            <td><?php echo $c->date_modified; ?></td>
                                            <th>
                                                <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo WY_Registry::get('router')->generate('admin-categories-edit', array('id'=>$c->cat_id)); ?>"><span class="glyphicon glyphicon-pencil"></a>
                                                <a class="btn btn-danger btn-sm" title="Edit" href="<?php echo WY_Registry::get('router')->generate('admin-categories-delete', array('id'=>$c->cat_id)); ?>"><span class="glyphicon glyphicon-trash"></a>
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