<?php
require_once ('../../connect.php');
session_start();
$ip = "";
if(!empty($_POST["val"])){
	$ip = $_POST["val"];
}else{

}
$getdata = "SELECT ipaddress FROM iptable WHERE ipaddress = ?";
if($stmt = mysqli_prepare($link, $getdata)){
	$insertip = ip2long($ip);
	mysqli_stmt_bind_param($stmt, "i", $insertip);
	if(mysqli_stmt_execute($stmt)){
		mysqli_stmt_store_result($stmt);
		if(mysqli_stmt_num_rows($stmt) == 1){
			echo "exist";
		}else{
			echo "ok";
		}
	}
}
mysqli_stmt_close($stmt);
?>