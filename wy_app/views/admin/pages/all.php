            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pages -> All Pages</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All Pages
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Permalink</th>
                                            <th>Date Add</th>
                                            <th>Published</th>
                                            <th>Date Modified</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php 
                                        $row = 1;
                                        foreach($pages as $p): ?>
                                        <tr class="<?php if($row % 2 == 0) echo 'even'; else echo 'odd'; $row++; ?> gradeX">
                                            <td><?php echo $p->title; ?></td>
                                            <td><?php echo $p->date_add; ?></td>
                                            <td><?php echo $p->published ? 'Yes' : 'No'; ?></td>
                                            <td><?php echo $p->permalink; ?></td>
                                            <td><?php echo $p->date_modified; ?></td>
                                            <th>
                                                <a href="<?php echo WY_Registry::get('router')->generate('admin-page-edit', array('id'=>$p->page_id)); ?>">Edit</a> | 
                                                <a href="<?php echo WY_Registry::get('router')->generate('admin-page-delete', array('id'=>$p->page_id)); ?>">Delete</a>
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