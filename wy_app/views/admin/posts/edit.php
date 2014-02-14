            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pages -> Edit Post</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Post -> {Title Post}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- CKEDITOR and FORM HERE -->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Post Title</label>
                                            <input type="text" id="title" name="title" placeholder="Post Title" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Permalink</label>
                                            <!-- 
                                            auto generate on key up in title input 
                                            replace space with "-"
                                            -->
                                            <input type="text" id="permalink" name="permalink"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Post Category</label>
                                            <select class="form-control">
                                                <option></option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Post Content</label>
                                            <textarea id="content" name="content" class="form-control" rows="3"></textarea>
                                            <script type='text/javascript' src='../lib/ckeditor/config.editor.js'></script>
                                        </div>
                                        <div class="form-group">
                                            <label>Tag</label>
                                            <!-- 
                                            plugin taglist with boostrap nyusul
                                            sementara seperti ini dahulu
                                            -->
                                            <input type="text" id="tag" name="tag"  class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Allow Comment</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="a_comment" type="checkbox" value="">Allow Comment on Page
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Published</label>
                                            <div class="checkbox">
                                                <label>
                                                    <input name="published" type="checkbox" value="">Publish Post
                                                </label>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
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