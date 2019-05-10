<?php
require_once ('../../connect.php');
session_start();
$_SESSION["status"] = "add";
$role = $max = "";
$selectlist = array();
if(isset($_GET["val"])){
  $role = $_GET["val"];
}
if(isset($_GET["val2"])){
  $max = $_GET["val2"];
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

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/FloorPhone.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">名稱</label>
        <input id = "source" name="source" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off">
        <span class="warning_source hidden">請輸入名稱</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">人員</label>
        <input id = "personnel" name="personnel" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off">
        <span class="warning_personnel hidden">請輸入人員名稱</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">電話</label>
        <input id = "phone" name="phone" type="text" maxLength = "10" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off">
        <span class="warning_phone hidden">請輸入電話</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">護理站權限</label>
        <select id='stationselect' name="stationselect">
          <option value='xx'>--選擇護理站--</option>
          <?php
          foreach($selectlist as $val){
            echo "<option value='".$val."'>".$val."</option>";
          }
          ?>
        </select>
        <span class="warning_station hidden">請選擇權限</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">排序</label>
        <input id = "sort" name="sort" type="number" min="0" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" value="<?php echo $max;?>">
        <span class="warning_sort hidden">請輸入電話</span>
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

  var source = false;
  var personnel = false;
  var phone = false;
  var station = false;
  var sort = false;
  if($("#sort").val().length != 0){
    sort = true;
  }
  $("#source").on("input", function(){
    if($(this).val().length == 0){
      $(".warning_source").removeClass("hidden");
      $("#btntosubmit").prop("disabled", true);
      source = false;
    }else{
      $(".warning_source").addClass("hidden");
      source = true;
      vali();
    }
  });
  $("#personnel").on("input", function(){
    if($(this).val().length == 0){
      $(".warning_personnel").removeClass("hidden");
      $("#btntosubmit").prop("disabled", true);
      personnel = false;
    }else{
      $(".warning_personnel").addClass("hidden");
      personnel = true;
      vali();
    }
  });
  $("#phone").on("input", function(){
    if($(this).val().length == 0){
      $(".warning_phone").removeClass("hidden");
      $("#btntosubmit").prop("disabled", true);
      phone = false;
    }else{
      $(".warning_phone").addClass("hidden");
      phone = true;
      vali();
    }
  });
  $("#stationselect").change(function(){
    if($(this).val() == "xx" ){
      $(".warning_station").removeClass("hidden");
      $("#btntosubmit").prop("disabled", true);
      station = false;
    }else{
      $(".warning_station").addClass("hidden");
      station = true;
      vali();
    }
  });

  $("#sort").on("input", function(){
    if($(this).val().length == 0){
      $(".warning_sort").removeClass("hidden");
      $("#btntosubmit").prop("disabled", true);
      sort = false;
    }else{
      $(".warning_sort").addClass("hidden");
      sort = true;
      vali();
    }
  });

  function vali(){

    if(source && personnel && phone && station && sort){
      $("#btntosubmit").prop("disabled", false);
    }
  }
</script>