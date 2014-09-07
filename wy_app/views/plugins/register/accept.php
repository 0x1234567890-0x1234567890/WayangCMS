<?php $router = WY_Registry::get('router'); ?>  
            <div class="row">
                <div class="col-lg-12">
                    <div class="wizard">
                        <div class="wizard">
                        <a><span class="badge"></span> Preferences</a>
                        <a href="<?php echo $router->generate('admin-plugins');?>"><span class="badge"></span> Plugins</a>
                        <a href="<?php echo $router->generate('register-member-all');?>"><span class="badge"></span> Register Member</a>
                        <a class="current"><span class="badge badge-inverse"></span> Accept Member</a>
                    </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>            
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Data for <?php echo $regs->name; ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- CKEDITOR and FORM HERE -->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <form class="form-horizontal" method="POST" action="">
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Last YROI Member Accept</label>
                                            <div class="col-lg-8">
                                                <h4><?php if(!empty($last->yroi_id)):
                                                    echo $last->name." #".$last->yroi_id;
                                                    else:
                                                        echo "-";
                                                    endif;
                                                ?></h4>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">YROI Number</label>
                                            <div class="col-lg-8">
                                                <input required="required" value="<?php echo $regs->yroi_id; ?>" type="text" class="form-control" id="yroi" name="yroi" placeholder="YROI Number">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nama Lengkap</label>
                                            <div class="col-lg-8">
                                                <input required="required" value="<?php echo $regs->name; ?>" type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Tempat Lahir</label>
                                                <div class="col-lg-8">
                                                    <input required="required" value="<?php echo $regs->tempat_lahir; ?>" type="text" class="form-control" id="tempat" name="tempat" placeholder="Tempat Lahir">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Tanggal Lahir</label>
                                            <div class="col-lg-8">
                                                <input required="required" value="<?php echo $regs->tanggal_lahir; ?>" type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Tanggal Lahir">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Asal Daerah/Propinsi</label>
                                            <div class="col-lg-8">
                                                <input required="required" value="<?php echo $regs->asal; ?>" type="text" class="form-control" id="asal" name="asal" placeholder="Asal Daerah/Propinsi">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nomor HP/Telp</label>
                                            <div class="col-lg-8">
                                                <input required="required" value="<?php echo $regs->nohp; ?>" type="text" class="form-control" id="hp-telp" name="hp-telp" placeholder="Nomor HP/Telp">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nomor Telp Darurat</label>
                                            <div class="col-lg-8">
                                                <input value="" type="text" value="<?php echo $regs->telp; ?>" class="form-control" id="telp" name="telp" placeholder="Nomor Telp Darurat">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Alamat Lengkap</label>
                                            <div class="col-lg-8">
                                                <textarea required="required" name="alamat" id="alamat" class="form-control" rows="5" style="resize:vertical;"><?php echo $regs->alamat; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nomor SIM</label>
                                            <div class="col-lg-8">
                                                <input required="required" value="<?php echo $regs->sim; ?>" type="text" class="form-control" id="sim" name="sim" placeholder="Nomor SIM">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">TNKB YZF R25</label>
                                            <div class="col-lg-8">
                                                <input required="required" value="<?php echo $regs->tnkb; ?>" type="text" class="form-control" id="tnkb" name="tnkb" placeholder="TNKB YZF R25">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Nomor Rangka/Mesin</label>
                                            <div class="col-lg-8">
                                                <input required="required" value="<?php echo $regs->rangka_mesin; ?>"  type="text" class="form-control" id="rangka-mesin" name="rangka-mesin" placeholder="Nomor Rangka/Mesin">
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