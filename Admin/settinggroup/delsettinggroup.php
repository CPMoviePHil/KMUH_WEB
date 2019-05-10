<?php 
require_once ('../../connect.php');
$delsequence = array();
$groupname = '';
if(isset($_GET['val'])){
  $groupname = $_GET['val'];
}
$delsequence[0] = "DELETE FROM typeofroles WHERE typeofroles = ?";
$delsequence[1] = "DELETE FROM pofnurses WHERE typeofroles = ?";
$delsequence[2] = "DELETE FROM pofadminuser WHERE typeofroles = ?";
$delsequence[3] = "DELETE FROM pofadminuserinformation WHERE typeofroles = ?";
$delsequence[4] = "DELETE FROM pofbulletin WHERE typeofroles = ?";
$delsequence[5] = "DELETE FROM poffiresetting WHERE typeofroles = ?";
$delsequence[6] = "DELETE FROM pofsettinggroup WHERE typeofroles = ?";
$delsequence[7] = "DELETE FROM pofsettingstation WHERE typeofroles = ?";
$delsequence[8] = "DELETE FROM poffloorphone WHERE typeofroles = ?";
$delsequence[9] = "DELETE FROM pofsetting WHERE typeofroles = ?";

foreach($delsequence as $vals){
	if($stmt = mysqli_prepare($link, $vals)){
		mysqli_stmt_bind_param($stmt, 's', $param_role);
		$param_role = $groupname;
		if(mysqli_stmt_execute($stmt)){
			echo 'success~~!';
		}
		else{
			echo 'fuckemeee';
		}
	}
	mysqli_stmt_close($stmt);	
}
?>