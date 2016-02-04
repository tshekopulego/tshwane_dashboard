<?php

// Get cURL resource - sends out the report update to the app
$curl = curl_init();

                       
			
			        $title = "Case Update";
				$message = "jhhjhjhjj";
		                $uid = "688";
			        $caseNum= "688/10/2015";
                                $status= "Updated";
                             
                               $url = 'http://test.tshwanesafety.co.za/dashboard/notification/sendupdatemessage.php';
 
                               $fields = array(
						'title' => urlencode($title),
						'message' => urlencode($message),
						'caseNum' => urlencode($caseNum),
                                                'uid' => urlencode($uid),
                                                'status' => urlencode($status)

					);
                                //url-ify the data for the POST
				foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				rtrim($fields_string, '&');

                                //set the url, number of POST vars, POST data
				curl_setopt($curl,CURLOPT_URL, $url);
				curl_setopt($curl,CURLOPT_POST, count($fields));
				curl_setopt($curl,CURLOPT_POSTFIELDS, $fields_string);
                                curl_setopt($curl, CURLOPT_VERBOSE, 1);
curl_exec ($curl);
curl_close ($curl);

?>