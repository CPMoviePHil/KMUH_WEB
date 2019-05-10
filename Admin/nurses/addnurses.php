<?php
require_once ('../../connect.php');
session_start();
$_SESSION['status'] = 'add';
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

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/Nurses.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">帳號</label>
        <input id = "account" name="account" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" autofocus>
        <span class="warning_account hidden">此帳號以重複</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">密碼</label>
        <input id = "password" name="password" type ='password' class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off">
        <span class="warning_password hidden">密碼請至少5碼</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">姓名</label>
        <input id = "username" name="username" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off">
        <span class="warning_username hidden">請輸入名字</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">護理站權限</label>
        <div class="col-xs-6">
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="7A">7A</label>
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="9ES">9ES</label>
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="9EN">9EN</label>
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="10A">10A</label>
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="10ES">10ES</label>
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="13ES">13ES</label>
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="13EN">13EN</label>
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="21ES">21ES</label>
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
  var account = false;
  var password = false;
  var username = false;
  var stations = false;
  $("#account").on('input',function(){
    $.post('nurses/check_account.php',{vals:$(this).val()},function(data){
      if(data == 'exist'){
        account = false;
        $('#btntosubmit').prop("disabled", true);
        $('.warning_account').removeClass('hidden');
      }else if(data == 'ok'){
        $('.warning_account').addClass('hidden');
        account = true;
        vali();
      }
      else{
        account = true;
        $('.warning_account').addClass('hidden');
        vali();
      }
    });
  });
  $('#password').on('input',function(){
    if($(this).val().length <= 5){
      $('.warning_password').removeClass('hidden');
      $('#btntosubmit').prop("disabled", true);
      password = false;
    }else{
      $('.warning_password').addClass('hidden');
      password = true;
      vali();
    }
  });
  $('#username').on('input',function(){
    if($(this).val().length < 1){
      $('#btntosubmit').prop("disabled", true);
      $('.warning_username').removeClass('hidden');
    }
    else{
      $('.warning_username').addClass('hidden');
      username = true;
      vali();
    }
  });
  
  $("input[name='stations[]']").change(function(){
    stationsCheck = $("input[name='stations[]']:checked").length;
    if(stationsCheck < 1){
      $('#btntosubmit').prop("disabled", true);
      $(".warning_roles").removeClass('hidden');
      stations = false;
    }else{
      $(".warning_roles").addClass('hidden');
      stations = true;
      vali();
    }
  });

  function vali(){
    if(account && password && username && stations )
    {
      $('#btntosubmit').prop("disabled", false);
    }
  }
</script>