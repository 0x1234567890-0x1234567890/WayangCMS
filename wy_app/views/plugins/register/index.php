<?php $router = WY_Registry::get('router'); ?>  
<div class="row col-lg-8">
    <div class="posting">
        <h2><a><?php echo $plugin->plugin_name; ?></a></h2>
        <?php
        if(WY_Session::has_flash('error'))
        {
            ?>
            <div class="alert alert-dismissable alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo WY_Session::get_flash('error');?>
            </div>
        <?php
        }
        elseif(WY_Session::has_flash('success'))
        {
            ?>
            <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <?php echo WY_Session::get_flash('success');?>
            </div>
        <?php
        }
        ?>
        <form class="form-horizontal" method="POST" action="<?php echo $router->generate('register-member') ?>">
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
                    <input required="required"  type="text" class="form-control" id="tanggal" name="tanggal" placeholder="YYYY/MM/DD">
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
                    <button type="reset" class="btn btn-default">Batal</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
</div> 