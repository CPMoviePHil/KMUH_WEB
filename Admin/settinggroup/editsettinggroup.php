<?php
session_start();
require_once('../../connect.php');
$_SESSION['status'] = 'edit';
$groupname = "";
if(isset($_GET['val'])){
  $groupname = $_GET['val'];
}
$_SESSION['typeofroles'] = $groupname;
$nurses = $adminuser = $adminuserinformation = $bulletin = $firesetting = $settinggroup = $settingstation = $floorphone = $setting = $statinos = array();

$select1 = "SELECT readonly, addonly, editonly, delonly FROM pofnurses WHERE typeofroles = ?";
$select2 = "SELECT readonly, addonly, editonly, delonly FROM pofadminuser WHERE typeofroles = ?";
$select3 = "SELECT readonly, addonly, editonly, delonly FROM pofadminuserinformation WHERE typeofroles = ?";
$select4 = "SELECT readonly, addonly, editonly, delonly FROM pofbulletin WHERE typeofroles = ?";
$select5 = "SELECT readonly, addonly, editonly, delonly FROM poffiresetting WHERE typeofroles = ?";
$select6 = "SELECT readonly, addonly, editonly, delonly FROM pofsetthinggroup WHERE typeofroles = ?";
$select7 = "SELECT readonly, addonly, editonly, delonly FROM pofsettingstation WHERE typeofroles = ?";
$select8 = "SELECT readonly, addonly, editonly, delonly FROM poffloorphone WHERE typeofroles = ?";
$select9 = "SELECT readonly, addonly, editonly, delonly FROM pofsetting WHERE typeofroles = ?";
$select10 = "SELECT privilegeof7A, privilegeof9ES, privilegeof9EN, privilegeof10A, privilegeof10ES, privilegeof13ES, privilegeof13EN, privilegeof21ES FROM typeofroles WHERE typeofroles = ?";

if($stmt1 = mysqli_prepare($link, $select1)){
	mysqli_stmt_bind_param($stmt1, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt1)){
		mysqli_stmt_bind_result($stmt1, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt1)){
			$nurses[0] = $temp_read;
			$nurses[1] = $temp_add;
			$nurses[2] = $temp_edit;
			$nurses[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme1';
	}
}
mysqli_stmt_close($stmt1);

if($stmt2 = mysqli_prepare($link, $select2)){
	mysqli_stmt_bind_param($stmt2, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt2)){
		mysqli_stmt_bind_result($stmt2, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt2)){
			$adminuser[0] = $temp_read;
			$adminuser[1] = $temp_add;
			$adminuser[2] = $temp_edit;
			$adminuser[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme2';
	}
}
mysqli_stmt_close($stmt2);

if($stmt3 = mysqli_prepare($link, $select3)){
	mysqli_stmt_bind_param($stmt3, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt3)){
		mysqli_stmt_bind_result($stmt3, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt3)){
			$adminuserinformation[0] = $temp_read;
			$adminuserinformation[1] = $temp_add;
			$adminuserinformation[2] = $temp_edit;
			$adminuserinformation[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme3';
	}
}
mysqli_stmt_close($stmt3);

if($stmt4 = mysqli_prepare($link, $select4)){
	mysqli_stmt_bind_param($stmt4, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt4)){
		mysqli_stmt_bind_result($stmt4, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt4)){
			$bulletin[0] = $temp_read;
			$bulletin[1] = $temp_add;
			$bulletin[2] = $temp_edit;
			$bulletin[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme4';
	}
}
mysqli_stmt_close($stmt4);

if($stmt5 = mysqli_prepare($link, $select5)){
	mysqli_stmt_bind_param($stmt5, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt5)){
		mysqli_stmt_bind_result($stmt5, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt5)){
			$firesetting[0] = $temp_read;
			$firesetting[1] = $temp_add;
			$firesetting[2] = $temp_edit;
			$firesetting[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme5';
	}
}
mysqli_stmt_close($stmt5);

if($stmt6 = mysqli_prepare($link, $select6)){
	mysqli_stmt_bind_param($stmt6, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt6)){
		mysqli_stmt_bind_result($stmt6, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt6)){
			$settinggroup[0] = $temp_read;
			$settinggroup[1] = $temp_add;
			$settinggroup[2] = $temp_edit;
			$settinggroup[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme6';
	}
}
mysqli_stmt_close($stmt6);

if($stmt7 = mysqli_prepare($link, $select7)){
	mysqli_stmt_bind_param($stmt7, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt7)){
		mysqli_stmt_bind_result($stmt7, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt7)){
			$settingstation[0] = $temp_read;
			$settingstation[1] = $temp_add;
			$settingstation[2] = $temp_edit;
			$settingstation[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme7';
	}
}
mysqli_stmt_close($stmt7);

if($stmt8 = mysqli_prepare($link, $select8)){
	mysqli_stmt_bind_param($stmt8, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt8)){
		mysqli_stmt_bind_result($stmt8, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt8)){
			$floorphone[0] = $temp_read;
			$floorphone[1] = $temp_add;
			$floorphone[2] = $temp_edit;
			$floorphone[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme8';
	}
}
mysqli_stmt_close($stmt8);

if($stmt9 = mysqli_prepare($link, $select9)){
	mysqli_stmt_bind_param($stmt9, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt9)){
		mysqli_stmt_bind_result($stmt9, $temp_read, $temp_add, $temp_edit, $temp_del);
		while(mysqli_stmt_fetch($stmt9)){
			$setting[0] = $temp_read;
			$setting[1] = $temp_add;
			$setting[2] = $temp_edit;
			$setting[3] = $temp_del;
		}
	}
	else{
		echo 'fuckme9';
	}
}
mysqli_stmt_close($stmt9);

if($stmt10 = mysqli_prepare($link, $select10)){
	mysqli_stmt_bind_param($stmt10, 's', $param_role);
	$param_role = $groupname;
	if(mysqli_stmt_execute($stmt10)){
		mysqli_stmt_bind_result($stmt10, $param_7A, $param_9ES, $param_9EN, $param_10A, $param_10ES, $param_13ES, $param_13EN, $param_21ES);
		while(mysqli_stmt_fetch($stmt10)){
			$stations[0] = $param_7A;
			$stations[1] = $param_9ES;
			$stations[2] = $param_9EN;
			$stations[3] = $param_10A;
			$stations[4] = $param_10ES;
			$stations[5] = $param_13ES;
			$stations[6] = $param_13EN;
			$stations[7] = $param_21ES;
		}
	}
	else{
		echo 'fuckme10';
	}
}
mysqli_stmt_close($stmt10);
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

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/SettingGroup.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">群組名稱</label>
        <input id = "groupname" name="groupname" class="col-xs-9 col-md-5" required spellcheck="false" autocomplete="off" value=<?php echo $groupname;?> autofocus>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label" >護理站人員表</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="nurses[]" value="nursesA" 
          	<?php if($nurses[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="nurses[]" value="nursesB"
          	<?php if($nurses[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="nurses[]" value="nursesC"
          	<?php if($nurses[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="nurses[]" value="nursesD"
          	<?php if($nurses[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">管理員列表</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="adminUser[]" value="adminUserA"
          	<?php if($adminuser[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUser[]" value="adminUserB"
          	<?php if($adminuser[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUser[]" value="adminUserC"
          	<?php if($adminuser[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUser[]" value="adminUserD"
          	<?php if($adminuser[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">個人資料列表</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="adminUserInformation[]" value="adminUserInformationA" <?php if($adminuserinformation[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUserInformation[]" value="adminUserInformationB" <?php if($adminuserinformation[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUserInformation[]" value="adminUserInformationC" <?php if($adminuserinformation[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUserInformation[]" value="adminUserInformationD" <?php if($adminuserinformation[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">病房公告</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="bulletin[]" value="bulletinA"
          	<?php if($bulletin[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="bulletin[]" value="bulletinB"
          	<?php if($bulletin[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="bulletin[]" value="bulletinC"
          	<?php if($bulletin[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="bulletin[]" value="bulletinD"
          	<?php if($bulletin[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">消防編組</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="fireSetting[]" value="fireSettingA"
          	<?php if($firesetting[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="fireSetting[]" value="fireSettingB"
          	<?php if($firesetting[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="fireSetting[]" value="fireSettingC"
          	<?php if($firesetting[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="fireSetting[]" value="fireSettingD"
          	<?php if($firesetting[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">群組設定</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="settingGroup[]" value="settingGroupA"
          	<?php if($settinggroup[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="settingGroup[]" value="settingGroupB"
          	<?php if($settinggroup[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="settingGroup[]" value="settingGroupC"
          	<?php if($settinggroup[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="settingGroup[]" value="settingGroupD"
          	<?php if($settinggroup[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">護理站管理</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="settingStation[]" value="settingStationA" <?php if($settingstation[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="settingStation[]" value="settingStationB" <?php if($settingstation[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="settingStation[]" value="settingStationC" <?php if($settingstation[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="settingStation[]" value="settingStationD" <?php if($settingstation[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">聯絡電話</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="floorPhone[]" value="floorPhoneA"
          	<?php if($floorphone[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="floorPhone[]" value="floorPhoneB"
          	<?php if($floorphone[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="floorPhone[]" value="floorPhoneC"
          	<?php if($floorphone[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="floorPhone[]" value="floorPhoneD"
          	<?php if($floorphone[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">設定</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="setting[]" value="settingA"
          	<?php if($setting[0] == 1):?> checked = "checked" <?php endif;?>>檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="setting[]" value="settingB"
          	<?php if($setting[1] == 1):?> checked = "checked" <?php endif;?>>新增</label>
          <label class="checkbox_label"><input type="checkbox" name="setting[]" value="settingC"
          	<?php if($setting[2] == 1):?> checked = "checked" <?php endif;?>>修改</label>
          <label class="checkbox_label"><input type="checkbox" name="setting[]" value="settingD"
          	<?php if($setting[3] == 1):?> checked = "checked" <?php endif;?>>刪除</label>
        </div>
      </div>
      <div class="form-group row"><label for="example-text-input" class="col-xs-2 col-form-label"></label><span id="warningSpan1" class="hidden">請至少選個權限</span></div>
      <div class="form-group">
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
      </div>
      <div class="form-group row"><label for="example-text-input" class="col-xs-2 col-form-label"></label><span id="warningSpan2" class="hidden">請至少選個權限</span></div>
      <div class="col-md-4 col-md-offset-4">
        <button class="btn btn-success" id="btnToSubmit" type="submit">提交</button>
      </div>
    </div>
  </form>
</body>
</html>
<script type="text/javascript">
  $( document ).ready(function() {
    $('input#groupname').focus();
  });
  function vali(){
    nursesCheck = $("input[name='nurses[]']:checked").length;
    adminUserCheck = $("input[name='adminUser[]']:checked").length;
    adminUserInformationCheck = $("input[name='adminUserInformation[]']:checked").length;
    bulletinCheck = $("input[name='bulletin[]']:checked").length;
    fireSettingCheck = $("input[name='fireSetting[]']:checked").length;
    settingGroupCheck = $("input[name='settingGroup[]']:checked").length;
    settingStationCheck = $("input[name='settingStation[]']:checked").length; 
    floorphoneCheck = $("input[name='floorPhone[]']:checked").length; 
    settingCheck = $("input[name='setting[]']:checked").length;

    checkOfAll = nursesCheck + adminUserCheck + adminUserInformationCheck + bulletinCheck + fireSettingCheck + settingGroupCheck + settingStationCheck + floorphoneCheck + settingCheck;

    console.log(checkOfAll);

    stationsCheck = $("input[name='stations[]']:checked").length;

    console.log(stationsCheck);

    if(checkOfAll > 0 && stationsCheck > 0){
      return true;
    }
    else{
      $('#warningSpan1').removeClass("hidden");
      $('#warningSpan2').removeClass("hidden");
      return false;
    }
  }
</script>
<script>

</script>