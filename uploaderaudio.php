<?php


    // Get image string posted from Android App
    $base=$_REQUEST['audio'];
    // Get file name posted from Android App
    $filename = $_REQUEST['filename'];
    // Decode Image
    $binary=base64_decode($base);
    header('Content-Type: audio/x-wav, audio/wav; charset=utf-8');
   
    $file = fopen('upload/gambar/'.$filename, 'wb');
    // Create File
    fwrite($file, $binary);
    fclose($file);
    echo 'Audio upload complete';

?>