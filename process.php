<?php
session_start();
include 'database.php';
$sql = "SELECT mobile FROM users where id=1";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);
error_reporting(0);
if($_POST['type']==1){
	    
		$mobile=$row['mobile'];
		
			$_SESSION['mobile']=$row['mobile'];
			$rand=rand(1000,9999);
			$_SESSION['otp']=$rand;
			$message="Your one time verification code for login is : $rand";
			Message($mobile,$message); 
			echo json_encode(array(
			"statusCode"=>200,
			"last4"=>substr($mobile,6)
			
			));
		
}
if($_POST['type']==2){
//	/echo $_SESSION['otp'];
		$otp=$_POST['otp'];
		if($_SESSION['otp']==$otp){
			echo json_encode(array(
			"statusCode"=>200
			
			));
		}
	    else{
			echo json_encode(array("statusCode"=>201));
		}
	
}
?>