<?php
require_once ('../../connect.php');

if(!empty(trim($_POST['val']))){
	$select1 = "SELECT email FROM adminuserinformation WHERE BINARY email = ?";
	if($stmt = mysqli_prepare($link, $select1)){
		mysqli_stmt_bind_param($stmt, 's', $param_email);
		$param_email = trim($_POST['val']);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 1){
				echo 'exist';
			}else{
				echo 'ok';
			}
		}else{
			echo 'execute failed';
		}
	}
	mysqli_stmt_close($stmt);
}
?>