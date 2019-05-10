<?php
require_once ('../../connect.php');
$selectsql = "SELECT accounts_nurses FROM accounts_nurses WHERE BINARY accounts_nurses = ?";
if(!empty(trim($_POST['vals']))){
	if($stmt = mysqli_prepare($link, $selectsql)){
		mysqli_stmt_bind_param($stmt, 's', $param_account);
		$param_account = trim($_POST['vals']);
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