<?php
require_once ('../../connect.php');
$delsequence = array();
$account = '';
if(isset($_GET['val'])){
  $account = $_GET['val'];
} 
$delsequence[0] = "DELETE FROM accounts WHERE userid = ?";
$delsequence[1] = "DELETE FROM adminuser WHERE userid = ?";
$delsequence[2] = "DELETE FROM adminuserinformation WHERE userid =?";
foreach($delsequence as $val){
	if($stmt = mysqli_prepare($link, $val)){
		mysqli_stmt_bind_param($stmt, 's', $param_userid);
		$param_userid = $account;
		if(mysqli_stmt_execute($stmt)){

		}else{
			echo 'fuck del failed';
		}
	}
	mysqli_stmt_close($stmt);
} 
?>