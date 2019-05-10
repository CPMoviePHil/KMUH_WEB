<?php
require_once ('../../connect.php');
$selectsql = "SELECT userid FROM accounts WHERE BINARY userid = ?";
if(!empty(trim($_POST['vals']))){
	if($stmt = mysqli_prepare($link, $selectsql)){
		mysqli_stmt_bind_param($stmt, 's', $param_userid);
		$param_userid = trim($_POST['vals']);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 1){
				echo 'exist';
			}
			else{
				echo 'ok';
			}
		}
	}
	mysqli_stmt_close($stmt);
}
?>