<?php
/* $servername = "localhost";
$username = "root";
$password = "";
$db="otp";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} */
function Message($custmobile, $sms_message){
		$authKey = "341690Ak1sRuthQO5f606057";/* Your authentication key */
		$mobileNumber = $custmobile;/* Multiple mobiles numbers separated by comma */
		$senderId = "BECOBL";/* Sender ID,While using route4 sender id should be 6 characters long. */
		$message = urlencode($sms_message);/* Your message to send, Add URL encoding here. */
		$route = "route=4";/* Define route */
		/* Prepare you post parameters */
		$postData = array(
			'authkey' => $authKey,
			'mobiles' => $mobileNumber,
			'message' => $message,
			'sender' => $senderId,
			'route' => $route
		);
		$url="https://control.msg91.com/api/sendhttp.php";/* API URL*/
		$ch = curl_init();/* init the resource */
		curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
		));
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);/* Ignore SSL certificate verification */
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		$output = curl_exec($ch);/* get response */
		curl_close($ch);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>