            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Comments</a>
                        <a class="current"><span class="badge badge-inverse"></span> All Comments</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            All Comment
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Post</th>
                                            <th>Page</th>
                                            <th>Date Comment</th>
                                            <th>Comment</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = 1; ?>
                                        <?php foreach($comment as $c): ?>
                                        <tr class="<?php if($row % 2 == 0) echo 'even'; else echo 'odd'; $row++; ?> gradeX">
                                            <td><?php echo $c->name; ?></td>
                                            <td><?php echo $c->email; ?></td>
                                            <td><?php 
                                                if($c->post_id==="") 
                                                {
                                                    echo "-";
                                                }
                                                else
                                                {
                                                    echo $c->ps_title; 
                                                }?></td>
                                            <td><?php 
                                                if($c->page_id==="") 
                                                {
                                                    echo "-";
                                                }
                                                else
                                                {
                                                    echo $c->pg_title; 
                                                }?></td>
                                            <td><?php echo $c->date; ?></td>
                                            <td><?php echo $c->content; ?></td>
                                            <th>
                                                <a class="btn btn-primary btn-sm" title="Edit" href="<?php echo WY_Registry::get('router')->generate('admin-comments-edit', array('id'=>$c->c_id)); ?>"><span class="glyphicon glyphicon-pencil"></a>
                                                <a class="btn btn-danger btn-sm" title="Edit" href="<?php echo WY_Registry::get('router')->generate('admin-comments-delete', array('id'=>$c->c_id)); ?>"><span class="glyphicon glyphicon-trash"></a>
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