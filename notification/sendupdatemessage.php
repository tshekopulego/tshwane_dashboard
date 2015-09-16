<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
if (isset($_GET["caseNum"])) {

     // include config
     include_once './db_functions.php';

     $title = $_GET["title"];
     $message = $_GET["message"];
     $caseNum= $_GET["caseNum"];

        $db = new DB_Functions();

        $regId = $db->getUserRegIdByCaseNum($caseNum);
        $regIdarr = array();
        array_push($regIdarr,$regId);
        

    include_once './GCM.php';

    $gcm = new GCM();

    $message = array("message" => $message, "title" => $title);

    $result = $gcm->send_notification($regIdarr, $message);


    echo $result;
}
?>