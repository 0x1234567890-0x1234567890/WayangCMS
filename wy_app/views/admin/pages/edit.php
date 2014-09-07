            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <a><span class="badge"></span> Pages</a>
                        <a href="<?php echo WY_Registry::get('router')->generate('admin-pages');?>"><span class="badge"></span> All Pages</a>
                        <a class="current"><span class="badge badge-inverse"></span> Edit Pages</a>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php echo $page->title;?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- CKEDITOR and FORM HERE -->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Page Title</label>
                                            <input type="text" id="title" name="title" value="<?php echo $page->title;?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Page Plugin/Module</label>
                                            <select class="form-control" name="plugin" id="plugin">
                                                <?php if(!empty($plugins)): ?>
                                                <option value="">Not Use</option>
                                                    <?php foreach($plugins as $p): ?>
                                                <option value="<?php echo $p->plugin_id;?>"><?php echo $p->plugin_name;?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Content</label>
                                            <textarea id="content" name="content" class="form-control" rows="3"><?php echo $page->content;?></textarea>
                                            <script type='text/javascript' src='<?php echo WY_Request::base_url(); ?>/assets/admin/ckeditor/config.editor.js'></script>
                                            <p class="help-block">Leave blank if use plugin or module.</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Allow Comment</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="a_comment" type="checkbox" <?php if($page->comment_open===1) echo "checked"; ?>>Allow Comment on Page
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Published</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="published" type="checkbox" <?php if($page->published===1) echo "checked"; ?>>Publish Page
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Page Parent</label>
                                            <select class="form-control" name="isParent" id="isParent">
                                                <?php if(!empty($isParent)): ?>
                                                <option value="">Not Use</option>
                                                    <?php foreach($isParent as $parent): ?>
                                                <option value="<?php echo $parent->page_id;?>"><?php echo $parent->title;?></option>
                                                    <?php endforeach; ?>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tags List</label>
                                            <input type="text" id="tags" name="tags" value="<?php echo $page->taglist;?>" placeholder="Tags List" class="form-control" data-role="tagsinput" >
                                        </div>
                                        <button type="submit" class="btn btn-info">Save Page</button>
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