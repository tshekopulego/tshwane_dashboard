<?php


    // Get image string posted from Android App
    $base=$_REQUEST['video'];
    // Get file name posted from Android App
    $filename = $_REQUEST['filename'];
    // Decode Image
    $binary=base64_decode($base);
    header('Content-Type: video/mp4; charset=utf-8');
   
    $file = fopen('upload/gambar/'.$filename, 'wb');
    // Create File
    fwrite($file, $binary);
    fclose($file);
    echo 'Video upload complete';

?>