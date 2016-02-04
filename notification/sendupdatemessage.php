<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
if (isset($_POST["caseNum"])) {

     // include config
     include_once './db_functions.php';

     $title = $_POST["title"];
     $message = $_POST["message"];
     $status = $_POST["status"];
     $caseNum= $_POST["caseNum"];
     $uid= $_POST["uid"];

        $db = new DB_Functions();

        $regId = $db->getUserRegIdByCaseNum($caseNum);
        $regIdarr = array();
        array_push($regIdarr,$regId);
        

    include_once './GCM.php';

    $gcm = new GCM();

    $message = array("message" => $message, "title" => $title,"status" => $status,"casenum" => $caseNum,"uid" => $uid);

    $result = $gcm->send_notification($regIdarr, $message);


    echo $result;
}
?>