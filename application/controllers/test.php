<?php
$json_data=array(
    "name" => "Shawn Ippotle",
    "company" => "Shippo",
    "street1" => "215 Clayton St.",
    "city" => "San Francisco",
    "state" => "CA",
    "zip" => "94117",
    "country" => "US",
    "phone" => "+1 555 341 9393",
    "email" => "shippotle@goshippo.com" 
);
$data = json_encode($json_data);
//FCM API end-point
$url = 'https://api.goshippo.com/addresses/';
//api_key in Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key
$server_key = 'shippo_test_56f8145f30bdc9c9534f59ea833c241c5f00abaf';
//header with content_type api key
$headers = array(
    'Content-Type:application/json',
    'Authorization:ShippoToken '.$server_key
);
//CURL request to route notification to FCM connection server (provided by Google)
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$result = curl_exec($ch);
if ($result === FALSE) {
    die('Oops! FCM Send Error: ' . curl_error($ch));
} else{
	var_dump($result);
}
curl_close($ch);
?>