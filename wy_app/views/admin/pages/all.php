            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Pages</a>
                        <a class="current"><span class="badge badge-inverse"></span> All Pages</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
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
                                            <th>Date Add</th>
                                            <th>Published</th>
                                            <th>Allow Comment</th>
                                            <th>Date Modified</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php $row = 1; ?>
                                       <?php foreach($pages as $p): ?>
                                        <tr class="<?php if($row % 2 == 0) echo 'even'; else echo 'odd'; $row++; ?> gradeX">
                                            <td><?php echo $p->title; ?></td>
                                            <td><?php echo $p->date_add; ?></td>
                                            <td><?php echo $p->published ? 'Yes' : 'No'; ?></td>
                                            <td><?php echo $p->comment_open ? 'Yes' : 'No'; ?></td>
                                            <td><?php echo $p->date_modified; ?></td>
                                            <th>
                                                <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo WY_Registry::get('router')->generate('admin-pages-edit', array('id'=>$p->page_id)); ?>"><span class="glyphicon glyphicon-pencil"></span></a>
                                                <a class="btn btn-info btn-sm" title="View" href=""><span class="glyphicon glyphicon-search"></span></a>
                                                <a class="btn btn-danger btn-sm" title="Delete" href="<?php echo WY_Registry::get('router')->generate('admin-pages-delete', array('id'=>$p->page_id)); ?>"><span class="glyphicon glyphicon-trash"></span></a>
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