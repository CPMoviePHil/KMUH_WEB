<?php
require_once ('../../connect.php');
$time = "";
$id = 1;
if(isset($_POST["val"])){
	$time = $_POST["val"];
}
$updatesql = "UPDATE setting SET deletetime = ? WHERE id = ?";
if($stmt = mysqli_prepare($link, $updatesql)){
	mysqli_stmt_bind_param($stmt, "ii", $time, $id);
	if(mysqli_stmt_execute($stmt)){
		echo "success";
	}else{
		echo "fail";
	}
}
mysqli_stmt_close($stmt);
?>