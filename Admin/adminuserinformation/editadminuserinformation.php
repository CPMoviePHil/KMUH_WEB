<?php
require_once ('../../connect.php');
session_start();
$_SESSION['status'] = 'edit';
$account = $phone = $email = $statusofphone = $statusofemail = '';
if(isset($_GET['val'])){
  $account = $_GET['val'];
}

$getdata = "SELECT phone, email, statusofphone, statusofemail FROM adminuserinformation WHERE userid = ?";
if($stmt = mysqli_prepare($link, $getdata)){
  mysqli_stmt_bind_param($stmt, 's', $param_userid);
  $param_userid = $account;
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      mysqli_stmt_bind_result($stmt, $temp_phone, $temp_email, $temp_statusphone, $temp_statusemail);
      while(mysqli_stmt_fetch($stmt)){
        $phone = $temp_phone;
        $email = $temp_email;
        $statusofphone = $temp_statusphone;
        $statusofemail = $temp_statusemail;
      }
    }
  }else{
    echo 'execute falied';
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

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/AdminUserInformation.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">信箱</label>
        <input id = "email" name="email" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" autofocus value = '<?php echo $email;?>'>
        <span class="warning_email1 hidden">此信箱以重複</span>
        <span class="warning_email2 hidden">信箱格式不符</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">是否啟動信箱</label>
        <label class="col-form-label">開啟<input name="statusofemail" type="radio" value="yes"
          <?php if($statusofemail){
            echo 'checked';
          }?>></label>
        <label class="col-form-label">關閉<input name="statusofemail" type="radio" value="no"
          <?php if($statusofemail){echo 'checked';}?>></label>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">手機號碼</label>
        <input id = "phone" name="phone" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" value = '<?php echo $phone;?>'>
        <span class="warning_phone1 hidden">電話重複</span>
        <span class="warning_phone2 hidden">請輸入電話</span>

      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">是否啟動電話</label>
        <label class="col-form-label">開啟<input name="statusofphone" type="radio" value="yes"
          <?php if($statusofphone){echo 'checked';}?>></label>
        <label class="col-form-label">關閉<input name="statusofphone" type="radio" value="no"
          <?php if($statusofphone){echo 'checked';}?>></label>
      </div>
    </div>
    <div class="col-md-4 col-md-offset-4">
      <input type="hidden" name = 'refer' value = <?php echo $account;?>>
      <button class="btn btn-success" id="btntosubmit" type="submit">提交</button>
    </div>
  </div>
</form>
</body>
</html>
<script>

  var email = true;
  function vali(){
    $('#btntosubmit').prop('disabled',!email);
  }
  $('#email').on('input', function(){
    var $validation = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if($(this).val().match($validation)){
      $('.warning_email2').addClass('hidden');
      $.post('adminuserinformation/check_mail.php',{val:$(this).val()},function(data){
        if(data == 'ok'){
          $('.warning_email1').addClass('hidden');
          email = true;
          vali();
        }else if(data == 'exist'){
          $('.warning_email1').removeClass('hidden');
          email = false;
          vali();
        }else{
          email = false;
          console.log('other error');
          console.log(data);
          vali();
        }
      });
    }else{
      $('.warning_email2').removeClass('hidden');
      email = false;
      vali();
    }
  })
</script>