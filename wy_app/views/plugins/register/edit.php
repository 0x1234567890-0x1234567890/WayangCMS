            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <div class="wizard">
                        <a><span class="badge"></span> Preferences</a>
                        <a href="<?php echo $router->generate('admin-plugins');?>"><span class="badge"></span> Plugins</a>
                        <a ><span class="badge"></span> Register Member</a>
                        <a class="current"><span class="badge badge-inverse"></span> Check Register</a>
                    </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?php echo $category->title; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- CKEDITOR and FORM HERE -->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" method="POST" action="<?php echo $router->generate('register-member') ?>">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">YROI Number</label>
                                            <div class="col-lg-8">
                                                <input required="required"  type="text" class="form-control" id="yroi" name="yroi" placeholder="YROI Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nama Lengkap</label>
                                            <div class="col-lg-8">
                                                <input required="required"  type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Tempat Lahir</label>
                                                <div class="col-lg-8">
                                                    <input required="required"  type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Tanggal Lahir</label>
                                            <div class="col-lg-8">
                                                <input required="required"  type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Lahir">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Asal Daerah/Propinsi</label>
                                            <div class="col-lg-8">
                                                <input required="required"  type="text" class="form-control" id="asal" name="asal" placeholder="Asal Daerah/Propinsi">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nomor HP/Telp</label>
                                            <div class="col-lg-8">
                                                <input required="required"  type="text" class="form-control" id="hp-telp" name="hp-telp" placeholder="Nomor HP/Telp">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nomor Telp Darurat</label>
                                            <div class="col-lg-8">
                                                <input value="" type="text" class="form-control" id="telp" name="telp" placeholder="Nomor Telp Darurat">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Alamat Lengkap</label>
                                            <div class="col-lg-8">
                                                <textarea required="required" name="alamat" id="alamat" class="form-control" rows="5" style="resize:vertical;"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nomor SIM</label>
                                            <div class="col-lg-8">
                                                <input required="required"  type="text" class="form-control" id="sim" name="sim" placeholder="Nomor SIM">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">TNKB YZF R25</label>
                                            <div class="col-lg-8">
                                                <input required="required"  type="text" class="form-control" id="tnkb" name="tnkb" placeholder="TNKB YZF R25">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nomor Rangka/Mesin</label>
                                            <div class="col-lg-8">
                                                <input required="required"  type="text" class="form-control" id="rangka-mesin" name="rangka-mesin" placeholder="Nomor Rangka/Mesin">
                                            </div>
                                        </div>
                                        <!--<div class="form-group">
                                            <label class="col-lg-4 control-label">Foto dengan R25</label>
                                            <div class="col-lg-8">
                                                <input type="file" name="foto" id="foto" class="form-control" placeholder="Pilih Photo">
                                            </div>
                                        </div>-->
                                        <div class="form-group">
                                            <div class="col-lg-8 col-lg-offset-4">
                                                <div class="checkbox">
                                                    <input required="required"  type="checkbox"  id="setuju" name="setuju" value="setuju"> Saya setuju dengan peraturan yang telah ditetap oleh Yamaha YZF R25 Owners Indonesia
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-8 col-lg-offset-4">
                                                <button type="reset" class="btn btn-danger">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Accept</button>
                                            </div>
                                        </div>
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