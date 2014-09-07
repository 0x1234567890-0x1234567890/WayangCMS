<?php

/* 
 * Kelas ini berfungsi untuk mengontrol proses upload gambar
 */

class WY_IUploader{
    public $imageType;
    public $image;
    public $message="";
    public $thumPath;
    public static $thumbnail=0.15;
    public $path;
    /*
     * fungsi mendapatkan info detail tentang image file
     */
    public function getInfo($file){
        $temp=getimagesize($file);
        $this->imageType=$temp[2];
        if( $this->imageType == IMAGETYPE_JPEG ){
            $this->image = imagecreatefromjpeg($file);
        }
        elseif( $this->imageType == IMAGETYPE_GIF ){
            $this->image = imagecreatefromgif($file);
        }
        elseif( $this->imageType == IMAGETYPE_PNG ){
            $this->image = imagecreatefrompng($file);
        }
    }
    /*
     * fungsi cek file bertipe jpeg/jpg,png,gif
     */
    public function checkExt($file){
        $this->getInfo($file);
        $stat=FALSE;
        if( $this->imageType == IMAGETYPE_JPEG ){
            $stat=TRUE;
        }
        elseif( $this->imageType == IMAGETYPE_GIF ){
            $stat=TRUE;
        }
        elseif( $this->imageType == IMAGETYPE_PNG ){
            $stat=TRUE;
        }
        return $stat;
    }
    /*
     * fungsi mendapatkan width image
     */
    public function getW(){
        return imagesx($this->image);
    }
    /*
     * fungsi mendapatkan height image
     */
    public function getH(){
        return imagesy($this->image);
    }
    /*
     * fungsi resize image
     */
    public function resizeImage($percent){
        $w=($percent/100)*$this->getW();
        $h=($percent/100)*$this->getH();
        $newI = imagecreatetruecolor($w, $h);
        imagecopyresampled($newI, $this->image, 0, 0, 0, 0, $w, $h, $this->getW(), $this->getH());
        $this->image = $newI;
    }
    /*
     * fungsi membuat thumbnail image
     */
    public function imageThumbnail(){
        $w=self::$thumbnail*$this->getW();
        $h=self::$thumbnail*$this->getH();
        $newI = imagecreatetruecolor($w, $h);
        imagecopyresampled($newI, $this->image, 0, 0, 0, 0, $w, $h, $this->getW(), $this->getH());
        $this->image = $newI;
    }
    /*
     * fungsi menyimpan image berdasarkan tipe mime nya(jpeg/jpg,png,gif)
     */
    public function save($file,$resize=FALSE,$x=NULL,$y=NULL,$compression=70){
        $this->getInfo($file);
        $this->path=BASEPATH."/assets/uploads/";
        if(!$resize){
            if( $this->imageType == IMAGETYPE_JPEG ){
            if(imagejpeg($this->image,$this->path,$compression)){
                $this->message="Image Saved!";
            }
            else{
                $this->message="Cannot Save Image!";
            }
        }
            elseif( $this->imageType == IMAGETYPE_GIF ){
                if(imagegif($this->image,$this->path)){
                    $this->message="Image Saved!";
                }
                else{
                    $this->message="Cannot Save Image!";
                }
            }
            elseif( $this->imageType == IMAGETYPE_PNG ){
                if(imagepng($this->image,$this->path)){
                    $this->message="Image Saved!";
                }
                else{
                    $this->message="Cannot Save Image!";
                }
            }
        }
        else{
            $this->resizeImage($percent);
            $this->imageThumbnail();
            if( $this->imageType == IMAGETYPE_JPEG ){
            if(imagejpeg($this->image,$this->path,$compression)){
                $this->message="Image Saved!";
            }
            else{
                $this->message="Cannot Save Image!";
            }
        }
            elseif( $this->imageType == IMAGETYPE_GIF ){
                if(imagegif($this->image,$this->path)){
                    $this->message="Image Saved!";
                }
                else{
                    $this->message="Cannot Save Image!";
                }
            }
            elseif( $this->imageType == IMAGETYPE_PNG ){
                if(imagepng($this->image,$this->path)){
                    $this->message="Image Saved!";
                }
                else{
                    $this->message="Cannot Save Image!";
                }
            }
        }
        return $this->message;
    }
    /*
     * fungsi public untuk menerima parameter kiriman berupa file image, path/location ,width,height,compression leve dari image
     */
    public static function saveImage($file,$resize=FALSE,$x=NULL,$y=NULL,$compression=80){
        $ext=$this->checkExt($file);
        if($ext===FALSE){
            return "File not allow to upload!";
        }
        else{
            $stat=$this->save($file,$resize=FALSE,$x=NULL,$y=NULL,$compression=80);
            return $stat;
        }
    }
}