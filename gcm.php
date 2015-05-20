<?php

//IF send device id generated with the SENDER ID by google api console from app
//to this script as request then accept it with POST/REQUEST method
$device_id = $_REQUEST['device_id'];
 
//simple message   
$message = "gcm test - successful";
 
// Set POST variables which will push to the device via GCM server
$url = 'https://android.googleapis.com/gcm/send';

//message for the device to push 
$fields = array(
                'registration_ids'  => array($device_id),
                'data'=> array( "message" => $message ));

//put your server key which is generated from google api console
//to generate key for localhost in api console use 0.0.0.0 or simply press ENTER.
$headers = array( 
                    'Authorization: key=YOUR_SERVER_KEY_GENERATED_FROM_API_CONSOLE',
                    'Content-Type: application/json'
                );
 
// Open connection
$ch = curl_init();
 
// Set the url, number of POST vars, POST data
curl_setopt( $ch, CURLOPT_URL, $url );
 
curl_setopt( $ch, CURLOPT_POST, true );
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
 
curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
 
// Execute post
$result = curl_exec($ch);
 
// Close connection
curl_close($ch);
 ?>
