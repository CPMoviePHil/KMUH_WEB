<?php
require_once("../../connect.php");
session_start();
$_SESSION["status"] = "edit";
$id = "";
$team = $teamname = $shift = "";
if(isset($_GET["val"])){
  $id = $_GET["val"];
}
$getdata = "SELECT team, teamname, shift FROM firesetting WHERE id = ?";
if($stmt = mysqli_prepare($link, $getdata)){
  mysqli_stmt_bind_param($stmt, "s", $id);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      mysqli_stmt_bind_result($stmt, $temp1, $temp2, $temp3);
      while(mysqli_stmt_fetch($stmt)){
        $team = $temp1;
        $teamname = $temp2;
        $shift = $temp3;
      }
    }
  }
}
mysqli_stmt_close($stmt);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
  <script src="../AdminCSSJS/JS/jquery.min.js"></script>

</head>

<body>

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/FireSetting.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">消防邊組名稱</label>
        <input id = "team" name="team" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" autofocus value="<?php echo $team;?>">
      </div>
    </div>
     <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">消防組別</label>
        <input id = "teamname" name="teamname" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" value="<?php echo $teamname;?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">時間</label>
        <select name="shift">
          <option value="大夜" <?php if($shift == "大夜"){echo "selected";}?>>大夜</option>
          <option value="白班" <?php if($shift == "白班"){echo "selected";}?>>白班</option>
          <option value="小夜" <?php if($shift == "小夜"){echo "selected";}?>>小夜</option>
        </select>
      </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
      <input type="hidden" value="<?php echo $id;?>" name = "refer">
      <button class="btn btn-success" id="btntosubmit" type="submit">提交</button>
    </div>
  </div>
</form>
</body>
</html>