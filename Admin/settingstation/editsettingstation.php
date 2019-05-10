<?php
require_once ('../../connect.php');
session_start();
$_SESSION["status"] = "edit";
$id = "";
if(isset($_GET["val"])){
  $id = $_GET["val"];
}
$stationchief = $tohome = "";
$getdata = "SELECT stationchief, tohome FROM settingstation WHERE id = ?";
if($stmt = mysqli_prepare($link, $getdata)){
  mysqli_stmt_bind_param($stmt, "i", $id);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      mysqli_stmt_bind_result($stmt, $temp1, $temp2);
      while(mysqli_stmt_fetch($stmt)){
        $stationchief = $temp1;
        $tohome = $temp2;
      }
    }
  }else{
    echo "faillll!";
  }
}mysqli_stmt_close($stmt);
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

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/SettingStation.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">護理長</label>
        <input id = "stationchief" name="stationchief" placeholder="護理長" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" autofocus value="<?php echo $stationchief;?>">
        <span class="warning_stationchief hidden">請輸入姓名</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">返回首頁時間(分鐘)</label>
        <input id = "tohome" name="tohome" type ="number" data-val-range-max="10" min="1"data-val-range-min="1" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" placeholder="分鐘" value="<?php echo $tohome;?>">
        <span class="warning_tohome hidden">數字請介於1-10</span>
      </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
      <input type="hidden" name="refer" value="<?php echo $id;?>">
      <button class="btn btn-success" id="btntosubmit" type="submit">提交</button>
    </div>
  </div>
</form>
</body>
</html>
<script>
  var stationchief = true;
  var tohome = true;

  $("#stationchief").on("input", function(){
    if($(this).val().length == 0){
      $(".warning_stationchief").removeClass("hidden");
      $("#btntosubmit").prop("disabled", true);
      stationchief = false;
    }else{
      $(".warning_stationchief").addClass("hidden");
      stationchief = true;
      vali();
    }
  });
  $("#tohome").on("input", function(){
    if($(this).val() > 10 ){
      $(".warning_tohome").removeClass("hidden");
      $("#btntosubmit").prop("disabled", true);
      tohome = false;
    }else{
      $(".warning_tohome").addClass("hidden");
      tohome = true;
      vali();
    }
  });
  function vali(){
    if(stationchief && tohome){
      $("#btntosubmit").prop("disabled", false);
    }
  }
</script>