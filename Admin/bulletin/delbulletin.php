<?php
require_once ("../../connect.php");
$id = "";
if(isset($_GET["val"])){
	$id = $_GET["val"];
}
$delsql = "DELETE FROM bulletin WHERE id = ?";
if($stmt = mysqli_prepare($link, $delsql)){
	mysqli_stmt_bind_param($stmt, "i", $id);
	if(mysqli_stmt_execute($stmt)){

	}else{
		echo "delete failed";
	}
}mysqli_stmt_close($stmt);
?>