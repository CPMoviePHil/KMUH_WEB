<?php
session_start();
$_SESSION["status"] = 'edit';
require_once ('../../connect.php');
$id = "";
if(isset($_GET['val'])){
  $id = $_GET['val'];
}

$title = $content = $toppest = $homepage = $dateofstart = $dateofend = $station = "";
$getdata = "SELECT title, content, toppest, homepage, dateofstart, dateofend, station FROM bulletin WHERE id = ?";
if($stmt = mysqli_prepare($link, $getdata)){
  mysqli_stmt_bind_param($stmt, 'i', $id);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      mysqli_stmt_bind_result($stmt, $temp, $temp1, $temp2, $temp3, $temp4, $temp5, $temp6);
      while(mysqli_stmt_fetch($stmt)){
        $title = $temp;
        $content = $temp1;
        $toppest = $temp2;
        $homepage = $temp3;
        $dateofstart = str_replace("-","/",$temp4);
        $dateofend = str_replace("-","/",$temp5);
        $station = $temp6;
      }
    }
  }else{
    echo 'executed failed';
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
</head>

<body>

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/Bulletin.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">標題</label>
        <input id = "title" placeholder="標題" name="title" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" value = "<?php echo $title;?>">
        <span class="warning_title hidden">請輸入標題</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">內容</label>
        <textarea id = "content" placeholder="內容" name="content" class="col-xs-4 col-md-4" cols="20" rows="8" required spellcheck="false" value = "" autocomplete="off" value = "<?php echo $content;?>"><?php echo $content;?></textarea>
        <span class="warning_content hidden">請輸入內容</span>

      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">是否置頂</label>
        <label class="col-form-label">置頂<input name="toppest" type="radio" value="yes" <?php if($toppest){echo "checked";}?>></label>
        <label class="col-form-label">不置頂<input name="toppest" type="radio" value="no" <?php if(!$toppest){echo "checked";}?>></label>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">顯示首頁</label>
        <label class="col-form-label">開啟<input name="homepage" type="radio" value="yes" <?php if($homepage){echo "checked";}?>
        ></label>
        <label class="col-form-label">關閉<input name="homepage" type="radio" value="no" <?php if(!$homepage){echo "checked";}?>
        ></label>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">起始時間</label>
        <input id="sdate" name = "sdate" type="text" class="col-xs-2 col-md-2" value="<?php echo date('Y/m/d');?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">結束時間</label>
        <input id="edate" name = "edate" type="text" placeholder="結束時間" class="col-xs-2 col-md-2" value="<?php echo $dateofend;?>">
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">護理站權限</label>
        <div class="col-xs-5" id="stations">
          <?php echo '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="'.$station.'" checked>'.$station.'</label>';?><span class="warning_roles hidden">請選擇權限</span>
        </div>
        
      </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
      <input type = "hidden" value= "<?php echo $id?>" name="refer">
      <button class="btn btn-success" id="btntosubmit" type="submit" disabled="true">提交</button>
    </div>
  </div>
</form>
</body>
</html>
<script>
  var title = true;
  var content = true;
  var stations = true;
  
  firstLen = ("input[name='stations[]']:checked").length;
  if(firstLen > 0){
    stations = true;
  }else{
    stations = false;
  }
  vali();
  $("#title").on("input", function(){
    if($(this).val().length == 0){
      $('.warning_title').removeClass('hidden');
      $('#btntosubmit').prop("disabled", true);
      title = false;
    }else{
      $('.warning_title').addClass('hidden');
      title = true;
      vali();
    }
  });
  $("#content").on("input",function(){
    if($(this).val().length == 0){
      $(".warning_content").removeClass("hidden");
      $('#btntosubmit').prop("disabled", true);
      content = false;
    }else{
      $(".warning_content").addClass("hidden");
      content = true;
      vali();
    }
  });
  $("input[name='stations[]']").change(function(){
    stationsCheck = $("input[name='stations[]']:checked").length;
    if(stationsCheck == 0){
      $('.warning_roles').removeClass('hidden');
      $('#btntosubmit').prop("disabled", true);
      stations = false;
    }else{
      $(".warning_roles").addClass("hidden");
      stations = true;
      console.log(stations);
      vali();
    }
  });
  function vali(){
    if(title && content && stations){
      console.log('wtf');
      $("#btntosubmit").prop("disabled",false);
    }
  }
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#sdate').datepicker({dateFormat: 'yy/mm/dd'});
    $('#edate').datepicker({dateFormat: 'yy/mm/dd'});
  });
</script>