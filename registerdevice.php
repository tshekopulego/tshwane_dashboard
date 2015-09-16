<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();

// check for required fields
if (isset($_POST['regId']) && isset($_POST['phoneNumber'])) {
 
    
    $regId = $_POST['regId'];
    $phoneNumber = $_POST['phoneNumber'];
     
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
 
    // connecting to db
    $db = new DB_CONNECT();
 
    // mysql inserting a new row
    $result = mysql_query("INSERT INTO registereddevices(regid,phonenumber) VALUES('$regId', '$phoneNumber') ON DUPLICATE KEY UPDATE regid=VALUES(regid),phonenumber=VALUES(phonenumber)");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        $response["success"] = 1;
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