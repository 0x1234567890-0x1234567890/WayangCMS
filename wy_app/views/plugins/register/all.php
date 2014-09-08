<?php $router = WY_Registry::get('router'); ?>  
            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Preferences</a>
                        <a href="<?php echo $router->generate('admin-plugins');?>"><span class="badge"></span> Plugins</a>
                        <a class="current"><span class="badge badge-inverse"></span> Register Member</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            All Members
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>YROI</th>
                                            <th>Name</th>
                                            <th>Province/State</th>
                                            <th>Address</th>
                                            <th>HP</th>
                                            <th>SIM</th>
                                            <th>TNKB</th>
                                            <th>Frame/Mechine Number</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $row = 1; ?>
                                        <?php foreach($regs as $r): ?>
                                        <tr class="<?php if($row % 2 == 0) echo 'even'; else echo 'odd'; $row++; ?> gradeX">
                                            <td><?php echo $r->yroi_id; ?></td>
                                            <td><?php echo $r->name; ?></td>
                                            <td><?php echo $r->asal; ?></td>
                                            <td><?php echo $r->alamat; ?></td>
                                            <td><?php echo $r->nohp; ?></td>
                                            <td><?php echo $r->sim; ?></td>
                                            <td><?php echo $r->tnkb; ?></td>
                                            <td><?php echo $r->rangka_mesin; ?></td>
                                            <td><?php echo $r->status ? 'Verify' : 'Not Verified'; ?></td>
                                            <th>
                                                <?php
                                                if($r->status===1)
                                                { ?>
                                                <a class="btn btn-primary btn-sm" title="Verify"><span class="glyphicon glyphicon-ok-sign"></a>
                                                <a class="btn btn-primary btn-sm" title="Unverify" href="<?php echo WY_Registry::get('router')->generate('register-member-unacc', array('id'=>$r->id)); ?>"><span class="glyphicon glyphicon-off"></a>
                                                <?php }
                                                else
                                                { ?>
                                                <a class="btn btn-primary btn-sm" title="Verify" href="<?php echo WY_Registry::get('router')->generate('register-member-acc', array('id'=>$r->id)); ?>"><span class="glyphicon glyphicon-ok-sign"></a>
                                                <a class="btn btn-primary btn-sm" title="Unverify"><span class="glyphicon glyphicon-off"></a>
                                                <?php }
                                                ?>
                                                <!--<a class="btn btn-primary btn-sm" title="Edit" href="<?php echo WY_Registry::get('router')->generate('register-member-edit', array('id'=>$r->id)); ?>"><span class="glyphicon glyphicon-pencil"></a>-->
                                                <a class="btn btn-danger btn-sm" title="Delete" href="<?php echo WY_Registry::get('router')->generate('register-member-delete', array('id'=>$r->id)); ?>"><span class="glyphicon glyphicon-trash"></a>
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