<?php
require_once ('../../connect.php');
session_start();
$_SESSION["status"] = "add";
$role = "";
$selectlist = array();
if(isset($_GET["val"])){
  $role = $_GET["val"];
}
if($role == "最高權限"){
  $selectlist[0] = "7A";
  $selectlist[1] = "9ES";
  $selectlist[2] = "9EN";
  $selectlist[3] = "10A";
  $selectlist[4] = "10ES";
  $selectlist[5] = "13ES";
  $selectlist[6] = "13EN";
  $selectlist[7] = "21ES";
}else{
  if($role == "7A_USER"){
    $selectlist[0] = "7A";
  }
  if($role == "9ES_USER"){
    $selectlist[0] = "9ES";
  }
  if($role == "9EN_USER"){
    $selectlist[0] = "9EN";
  }
  if($role == "10A_USER"){
    $selectlist[0] = "10A";
  }
  if($role == "10ES_USER"){
    $selectlist[0] = "10ES";
  }
  if($role == "13EN_USER"){
    $selectlist[0] = "13EN";
  }
  if($role == "13ES_USER"){
    $selectlist[0] = "13ES";
  }
  if($role == "21ES_USER"){
    $selectlist[0] = "21ES";
  }
}
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
        <input id = "stationchief" name="stationchief" placeholder="護理長" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" autofocus>
        <span class="warning_stationchief hidden">請輸入姓名</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">返回首頁時間(分鐘)</label>
        <input id = "tohome" name="tohome" type ="number" data-val-range-max="10" min="1"data-val-range-min="1" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" placeholder="分鐘">
        <span class="warning_tohome hidden">數字請介於1-10</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">護理站權限</label>
        <select id='roles' name="roles">
          <?php
          foreach($selectlist as $station){
            echo "<option  value='".$station."'>".$station."</option>";
          }
          ?>
        </select>
        <span class="warning_roles hidden">請選擇權限</span>
      </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
      <button class="btn btn-success" id="btntosubmit" type="submit" disabled="true">提交</button>
    </div>
  </div>
</form>
</body>
</html>
<script>
  var stationchief = false;
  var tohome = false;

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