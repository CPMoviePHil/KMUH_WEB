<?php
require_once('../connect.php');
$selectnurses = "SELECT a.readonly FROM pofnurses as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
if($stmt = mysqli_prepare($link, $selectnurses)){
	mysqli_stmt_bind_param($stmt, 's', $param_role);
	$param_role = 'test_10A';
	if(mysqli_stmt_execute($stmt)){
		mysqli_stmt_bind_result($stmt, $yeah);
		while(mysqli_stmt_fetch($stmt)){
			echo $yeah;
		}
	}
}
mysqli_stmt_close($stmt);
?>