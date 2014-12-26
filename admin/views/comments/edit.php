            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Comments</a>
                        <a href="<?php echo WY_Registry::get('router')->generate('admin-comments');?>"><span class="badge"></span> All Comments</a>
                        <a class="current"><span class="badge badge-inverse"></span> Edit</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php echo $comment->name;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- CKEDITOR and FORM HERE -->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Sender Name</label>
                                            <input type="text" id="name" value="<?php echo $comment->name;?>" name="name" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sender Email</label>
                                            <input type="text" id="email" value="<?php echo $comment->email;?>" name="email" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Sender URL</label>
                                            <input type="text" id="url" value="<?php echo $comment->url;?>" name="url" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Comment Content</label>
                                            <textarea id="content" name="content" class="form-control" rows="3"><?php echo $comment->content;?></textarea>
                                            <script type='text/javascript' src='<?php echo WY_Request::base_url(); ?>/assets/admin/ckeditor/config.editor.js'></script>
                                        </div>
                                        <button type="submit" class="btn btn-info">Save Comment</button>
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