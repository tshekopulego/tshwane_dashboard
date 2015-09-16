<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

    // Get image string posted from Android App
    $base=$_REQUEST['image'];
    // Get file name posted from Android App
    $filename = $_REQUEST['filename'];


     // Decode Image
    $binary=base64_decode($base);
    header('Content-Type: bitmap; charset=utf-8');
   
    $file = fopen('upload/gambar/'.$filename, 'wb');
    // Create File
    fwrite($file, $binary);
    fclose($file);
    echo 'Image upload complete';

?>