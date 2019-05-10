<?php
require_once ("../../connect.php");
$station = $shift = $team = "";
if(isset($_POST["val_station"])){
    $station = $_POST["val_station"];
}else{

}
if(isset($_POST["val_shift"])){
    $shift = $_POST["val_shift"];
}else{
}
if(isset($_POST["val_team"])){
    $team = $_POST["val_team"];
}else{

}
if(isset($_POST["val_station"]) && isset($_POST["val_shift"]) && isset($_POST["val_team"])){
	$insertdata = "INSERT INTO firesetting (station, shift, team) VALUES (?,?,?)";
if($stmt = mysqli_prepare($link, $insertdata)){
	mysqli_stmt_bind_param($stmt, "sss", $station, $shift, $team);
	if(mysqli_stmt_execute($stmt)){
		echo "succeed";
	}else{
		echo 'failed';
	}
}mysqli_stmt_close($stmt);
}
?>