<?php
require_once ('../../connect.php');
session_start();
$_SESSION['status'] = 'edit';


$stations = $temp_a = array();
$account = $username = $area = $password = "";
$temp_account = "";
if(isset($_GET['val'])){
  $temp_account = $_GET['val'];
}
$getdata = "SELECT a.accounts_nurses, a.username, a.area, b.password FROM nurses as a, accounts_nurses as b WHERE a.accounts_nurses = b.accounts_nurses AND b.accounts_nurses = ?";
if($stmt = mysqli_prepare($link, $getdata)){
  mysqli_stmt_bind_param($stmt, 's', $param_account);
  $param_account = $temp_account;
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){
      mysqli_stmt_bind_result($stmt, $temp_accounts, $temp_usernames, $temp_areas, $temp_password);
      while(mysqli_stmt_fetch($stmt)){
        $account = $temp_accounts;
        $username = $temp_usernames;
        $area = $temp_areas;
        $password = $temp_password;
      }
    }
  }
}
mysqli_stmt_close($stmt);
$temp_a = explode(",",$area);
foreach($temp_a as $vals){
  if($vals == '7A'){
    $stations[0] = 1;
  }else if($vals == '9ES'){
    $stations[1] = 1;
  }else if($vals == '9EN'){
    $stations[2] = 1;
  }else if($vals == '10A'){
    $stations[3] = 1;
  }else if($vals == '10ES'){
    $stations[4] = 1;
  }else if($vals == '13ES'){
    $stations[5] = 1;
  }else if($vals == '13EN'){
    $stations[6] = 1;
  }else if($vals == '21ES'){
    $stations[7] = 1;
  }
}

for($x = 0; $x < 8;$x++){
  if(empty($stations[$x])){
    $stations[$x] = 0;
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

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/Nurses.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">帳號</label>
        <input id = "account" name="account" type="text" class="col-xs-3 col-md-3" required spellcheck="false" autocomplete="off" value="<?php echo $account;?>" autofocus>
        <span class="warning_account hidden">此帳號以重複</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">密碼</label>
        <input id = "password" name="password" type ='password' class="col-xs-3 col-md-3" required spellcheck="false" value="<?php echo $password;?>" autocomplete="off">
        <span class="warning_password hidden">密碼請至少5碼</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">姓名</label>
        <input id = "username" name="username" type="text" class="col-xs-3 col-md-3" required spellcheck="false" value="<?php echo $username;?>" autocomplete="off">
        <span class="warning_username hidden">請輸入名字</span>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">護理站權限</label>
        <div class="col-xs-6">
          <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="7A"
            <?php if($stations[0] == 1):?> checked = "checked" <?php endif;?>>7A</label>
            <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="9ES"
              <?php if($stations[1] == 1):?> checked = "checked" <?php endif;?>>9ES</label>
              <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="9EN"
                <?php if($stations[2] == 1):?> checked = "checked" <?php endif;?>>9EN</label>
                <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="10A"
                  <?php if($stations[3] == 1):?> checked = "checked" <?php endif;?>>10A</label>
                  <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="10ES"
                    <?php if($stations[4] == 1):?> checked = "checked" <?php endif;?>>10ES</label>
                    <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="13ES"
                      <?php if($stations[5] == 1):?> checked = "checked" <?php endif;?>>13ES</label>
                      <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="13EN"
                        <?php if($stations[6] == 1):?> checked = "checked" <?php endif;?>>13EN</label>
                        <label class="checkbox_label"><input name ="stations[]" type="checkbox" value="21ES"
                          <?php if($stations[7] == 1):?> checked = "checked" <?php endif;?>>21ES</label>
                        </div>
                        <span class="warning_roles hidden">請選擇權限</span>
                      </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                      <input type="hidden" value = "<?php echo $temp_account;?>" name="refer">
                      <button class="btn btn-success" id="btntosubmit" type="submit">提交</button>
                    </div>
                  </div>
                </form>
              </body>
              </html>
              <script>
                var account_unchange = $("#account").val();
                var account = true;
                var password = true;
                var username = true;
                var stations = true;
                $("#account").on('input',function(){
                  if($(this).val() != account_unchange){
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
                  }
                  else{
                    account = true;
                    vali();
                  }
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