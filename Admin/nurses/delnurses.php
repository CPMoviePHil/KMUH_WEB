<?php
require_once ('../../connect.php');
$account="";
$delsequence = array();
if(isset($_GET['val'])){
	$account = $_GET['val'];
}
$delsequence[0] = "DELETE FROM accounts_nurses WHERE accounts_nurses = ?";
$delsequence[1] = "DELETE FROM nurses WHERE accounts_nurses = ?";
foreach($delsequence as $vals){
	if($stmt = mysqli_prepare($link, $vals)){
		mysqli_stmt_bind_param($stmt, 's', $account);
		if(mysqli_stmt_execute($stmt)){

		}else{
			echo 'fuck del failed';
		}
	}
	mysqli_stmt_close($stmt);
}
?>