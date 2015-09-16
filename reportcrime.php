<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['description']) && isset($_POST['categoryType'])) {
 
    
    $description = $_POST['description'];
    $categoryType = $_POST['categoryType'];
    $lat= $_POST['lat'];
    $lot= $_POST['lot'];
    $user= $_POST['user'];
    $mobile= $_POST['mobile'];
    $location= $_POST['location'];
    $imageloc= $_POST['imagelocation'];
    $videoloc= $_POST['videolocation'];
    $audioloc= $_POST['audiolocation'];
    $subCategoryType = $_POST['type'];
    $name = $_POST['name'];
    $channel = "MobileApp";
    $audiostr ="";
    $videostr = "";
    $regId = $_POST['regId'];


    if (!empty($audioloc)) {
       $audiostr = "<audio controls><source  src=\"../upload/gambar/" . $audioloc . "\" width=\"100%\" type=\"audio/mp3\"></source></audio>";
    }

    if (!empty($videoloc)) {
       $videostr = "<video width=\"320\" height=\"240\" controls><source  src=\"../upload/gambar/" . $videoloc ."\" width=\"100%\" type=\"video/mp4\"></source></video>";
    }
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();

 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO crimereport(description,area,lat,lot,user,mobile,location,imagelocation,videolocation,audiolocation,type,reportedon,reportedby,channel,regId) VALUES('$description', '$categoryType', '$lat', '$lot', '$user','$mobile','$location','$imageloc','$videostr','$audiostr','$subCategoryType',NOW(),'$name','$channel','$regId')");
 
    // check if row inserted or not
    if ($result) {
         $today = date("m.d.y");
         mysql_query("UPDATE crimereport SET refnum=concat(LAST_INSERT_ID(),\"/\",DATE_FORMAT(NOW(),'%m/%Y')) WHERE id = LAST_INSERT_ID()");

        // successfully inserted into database
        $last_id = mysql_insert_id();
        $response["success"] = 1;
        $response["uid"] = $last_id;
        $response["message"] = "Submitted successfully.";
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        // failed to insert row
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.".mysql_error();
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($response);
}
?>