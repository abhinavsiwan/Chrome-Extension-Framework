<?php
    $basefile = basename($_GET['file']);
    $file = 'Login_FrameWork1/'.$basefile;

    if(!$file){ // file does not exist
        die('file not found');
    } else {
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$basefile");
        header("Content-Type: application/zip");
        //header("Content-Type: application/octet-stream");
        header("Content-Transfer-Encoding: binary");

        // read the file from disk
        readfile($file);
    }
?>