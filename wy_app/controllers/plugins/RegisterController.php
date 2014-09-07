<?php

class RegisterController extends WY_TController
{
    public $layout = 'admin/index';
    
    public function all()
    {
        $regs = WY_Db::all('SELECT * FROM wy_register_member ORDER BY status ASC');
        $this->layout->pageTitle = 'Wayang CMS - Register Member';
        $this->layout->content = WY_View::fetch('plugins/register/all', array('regs'=>$regs));
    }
    
    public function accept($id)
    {
        $regs = WY_Db::row('SELECT * FROM wy_register_member WHERE id = :id', array(':id'=> (int) $id));
        if(!$regs){
            $view = new WY_View('404');
            $view->render();
            exit();
        }
        $last = WY_Db::row('SELECT yroi_id,name FROM wy_register_member WHERE yroi_id<>0 ORDER BY yroi_id DESC LIMIT 0,1');
        if(WY_Request::isPost()){
            $yroi = $_POST['yroi'];
            $nama = $_POST['name'];
            $tempat = $_POST['tempat'];
            $tanggal = $_POST['tanggal'];
            $asal = $_POST['asal'];
            $hp = $_POST['hp-telp'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];
            $sim = $_POST['sim'];
            $tnkb = $_POST['tnkb'];
            $rangkamesin = $_POST['rangka-mesin'];
            
            WY_Db::execute("UPDATE `wy_register_member` SET `yroi_id`=:yroi,`name`=:nama,`tempat_lahir`=:tempat,`tanggal_lahir`=:tanggal,`asal`=:asal,`nohp`=:hp,`telp`=:telp,`alamat`=:alamat,`sim`=:sim,`tnkb`=:tnkb,`rangka_mesin`=:norm, `status`=1 WHERE `id`=:id",array(
                        ':yroi'=>$yroi,
                        ':nama'=>$nama,
                        ':tempat'=>$tempat,
                        ':tanggal'=>$tanggal,
                        ':asal'=>$asal,
                        ':hp'=>$hp,
                        ':telp'=>$telp,
                        ':alamat'=>$alamat,
                        ':sim'=>$sim,
                        ':tnkb'=>$tnkb,
                        ':norm'=>$rangkamesin,
                        ':id'=> (int) $id,
                    ));
            WY_Response::redirect('admin/plugins/register/all');
        }
        $this->layout->pageTitle = 'Wayang CMS - Edit Category';
        $this->layout->content = WY_View::fetch('plugins/register/accept', array('regs'=>$regs,'last'=>$last));
    }
    
    public function save()
    {
        if(WY_Request::isPost())
        {
            $nama = $_POST['name'];
            $tempat = $_POST['tempat'];
            $tanggal = $_POST['tanggal'];
            $asal = $_POST['asal'];
            $hp = $_POST['hp-telp'];
            $telp = $_POST['telp'];
            $alamat = $_POST['alamat'];
            $sim = $_POST['sim'];
            $tnkb = $_POST['tnkb'];
            $rangkamesin = $_POST['rangka-mesin'];
            WY_Db::execute("INSERT INTO `wy_register_member`(`name`, `tempat_lahir`, `tanggal_lahir`, `asal`, `nohp`, `telp`, `alamat`, `sim`, `tnkb`, `rangka_mesin`, `status`) "
                    . "VALUES (:nama,:tempat,:tanggal,:asal,:hp,:telp,:alamat,:sim,:tnkb,:norm,0)",array(
                        ':nama'=>$nama,
                        ':tempat'=>$tempat,
                        ':tanggal'=>$tanggal,
                        ':asal'=>$asal,
                        ':hp'=>$hp,
                        ':telp'=>$telp,
                        ':alamat'=>$alamat,
                        ':sim'=>$sim,
                        ':tnkb'=>$tnkb,
                        ':norm'=>$rangkamesin,
                    ));
            WY_Session::set_flash('success', 'Register Sukses');
            WY_Response::redirect('page/register');
        }
    }
    
    public function unaccept($id)
    {
        WY_Db::execute('UPDATE `wy_register_member` SET status=0 WHERE id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/plugins/register/all');
    }
    public function delete($id)
    {
        WY_Db::execute('DELETE FROM `wy_register_member` WHERE id = :id', array(':id'=> (int) $id));
        WY_Response::redirect('admin/categories/all');
    }
} 