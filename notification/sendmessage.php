<?php
if (isset($_GET["message"])) {

     // include config
     include_once './db_functions.php';

     $title = $_GET["title"];
     $message = $_GET["message"];
     $pictureurl = $_GET["pictureurl"];

        $db = new DB_Functions();

        $users = $db->getAllUsers();
        $regIds = array();

        while($row = mysql_fetch_array($users)) {

        array_push($regIds,$row['regId']);      
        }
        echo isset($users);
        if ($users != false)
            $no_of_users = mysql_num_rows($users);
        else
            $no_of_users = 0;


    include_once './GCM.php';

    $gcm = new GCM();

    $message = array("message" => $message, "title" => $title, "pictureurl" => $pictureurl);

    $result = $gcm->send_notification($regIds, $message);


    echo $result;
}
?>