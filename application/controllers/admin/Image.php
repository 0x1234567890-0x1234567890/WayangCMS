<?php
/*
 * Image Controller, untuk menghandle proses uploade image
 */
if (isset($_FILES['file'])){
    if((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/png"))){
        $up=new WY_IUploader();
        if(isset($_POST['resize'])){
            if($_POST['resize']==NULL || $_POST['resize']==""){
                $status=$up->saveImage($file, $resize=FALSE, $_POST['resize'],$compression=80);
            }
            else{
                $status=$up->saveImage($file, $resize=FALSE,$resizePercent=100,$compression=80);
            }
        }        
        if($status==="Success"){
            echo $status;
        }
        else{
            echo $status;
        }
    }
}