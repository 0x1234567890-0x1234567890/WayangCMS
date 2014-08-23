
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Category -> All Categories</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
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
                                            <th></th>
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
                                                <a href="<?php echo WY_Registry::get('router')->generate('admin-categories-edit', array('id'=>$c->cat_id)); ?>">Edit</a> | 
                                                <a href="<?php echo WY_Registry::get('router')->generate('admin-categories-delete', array('id'=>$c->cat_id)); ?>">Delete</a>
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