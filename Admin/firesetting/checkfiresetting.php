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
$selectsql = "SELECT station, shift, team FROM firesetting WHERE station = ? AND shift = ? AND team = ?";
if($stmt = mysqli_prepare($link, $selectsql)){
    mysqli_stmt_bind_param($stmt, "sss", $station, $shift, $team);
    if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){
            echo "exist";
        }else{
            echo "couldbeadd";
        }
    }else{
        echo "failed";
    }
}
mysqli_stmt_close($stmt);
/*
$("#AddFireList").on("click", function () {
        var Sattion = $("#StationList option:selected").val();
        var TimeClass = $("#TimeClassList option:selected").val();
        $.get("/Admin/FireListExist?StationId=" + Sattion + "&TimeClass=" + TimeClass,function(data){
            if (data.bools == false) {
                alert(data.StationId + data.TimeClass + "已重複新增")
            }
            else {
                $("#DataList").load("/Admin/AddFireList?StationId=" + Sattion + "&TimeClass=" + TimeClass, function (data) {
                });
            }
        });

});
*/
?>
