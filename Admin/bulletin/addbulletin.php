<?php
session_start();
$_SESSION["status"] = 'add';
require_once ('../../connect.php');
$role = "";
if(isset($_GET['val'])){
  $role = $_GET['val'];
}
$checkboxsequence = array();
$checkboxsequence[0] = '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="7A" checked>7A</label>';
$checkboxsequence[1] = '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="9ES" checked>9ES</label>';
$checkboxsequence[2] = '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="9EN" checked>9EN</label>';
$checkboxsequence[3] = '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="10A" checked>10A</label>';
$checkboxsequence[4] = '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="10ES" checked>10ES</label>';
$checkboxsequence[5] = '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="13ES" checked>13ES</label>';
$checkboxsequence[6] = '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="13EN" checked>13EN</label>';
$checkboxsequence[7] = '<label class="checkbox_label"><input name ="stations[]" type="checkbox" value="21ES" checked>21ES</label>';
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
        <input id = "title" placeholder="標題" name="title" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" autofocus>
        <span class="warning_title hidden">請輸入標題</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">內容</label>
        <textarea id = "content" placeholder="內容" name="content" class="col-xs-4 col-md-4" cols="20" rows="8" required spellcheck="false" autocomplete="off"></textarea>
        <span class="warning_content hidden">請輸入內容</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">是否置頂</label>
        <label class="col-form-label">置頂<input name="toppest" type="radio" value="yes"
          ></label>
          <label class="col-form-label">不置頂<input name="toppest" type="radio" value="no" checked
            ></label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-group row">
            <label class="col-xs-2 col-form-label">顯示首頁</label>
            <label class="col-form-label">開啟<input name="homepage" type="radio" value="yes"
              ></label>
              <label class="col-form-label">關閉<input name="homepage" type="radio" value="no" checked
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
                <input id="edate" name = "edate" type="text" placeholder="結束時間" class="col-xs-2 col-md-2">
              </div>
            </div>
            <div class="form-group">
              <div class="form-group row">
                <label for="example-text-input" class="col-xs-2 col-form-label">護理站權限</label>
                <div class="col-xs-5" id="stations">
                  <?php
                  if($role == "7A_USER"){
                    echo $checkboxsequence[0];
                  }
                  if($role == "9ES_USER"){
                    echo $checkboxsequence[1];
                  }
                  if($role == "9EN_USER"){
                   echo $checkboxsequence[2];
                 }
                 if($role == "10A_USER"){
                   echo $checkboxsequence[3];
                 }
                 if($role == "10ES_USER"){
                  echo $checkboxsequence[4];
                }
                if($role == "13EN_USER"){
                 echo $checkboxsequence[5];
               }
               if($role == "13ES_USER"){
                echo $checkboxsequence[6];
              }
              if($role == "21ES_USER"){
               echo $checkboxsequence[7];
             }
             if($role == "最高權限"){
              foreach($checkboxsequence as $vals){
                echo $vals;
              }
            }
            ?>
          </div>
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
  var title = false;
  var content = false;
  var stations;
  firstLen = ("input[name='stations[]']:checked").length;
  if(firstLen > 0){
    stations = true;
  }else{
    stations = false;
  }
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
      vali();
    }
  });
  function vali(){
    if(title && content && stations){
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