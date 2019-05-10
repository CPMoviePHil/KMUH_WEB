<?php
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

  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/SettingGroup.php">
    <div class="form-group">
      <div class="form-group row">
        <label class="col-xs-2 col-form-label">群組名稱</label>
        <input id = "groupname" name="groupname" class="col-xs-9 col-md-5" required spellcheck="false" autocomplete="off" autofocus>
      </div>
    </div>
    <div class="form-group">
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label" >護理站人員表</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="nurses[]" value="nursesA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="nurses[]" value="nursesB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="nurses[]" value="nursesC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="nurses[]" value="nursesD">刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">管理員列表</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="adminUser[]" value="adminUserA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUser[]" value="adminUserB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUser[]" value="adminUserC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUser[]" value="adminUserD">刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">個人資料列表</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="adminUserInformation[]" value="adminUserInformationA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUserInformation[]" value="adminUserInformationB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUserInformation[]" value="adminUserInformationC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="adminUserInformation[]" value="adminUserInformationD">刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">病房公告</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="bulletin[]" value="bulletinA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="bulletin[]" value="bulletinB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="bulletin[]" value="bulletinC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="bulletin[]" value="bulletinD">刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">消防編組</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="fireSetting[]" value="fireSettingA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="fireSetting[]" value="fireSettingB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="fireSetting[]" value="fireSettingC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="fireSetting[]" value="fireSettingD">刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">群組設定</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="settingGroup[]" value="settingGroupA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="settingGroup[]" value="settingGroupB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="settingGroup[]" value="settingGroupC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="settingGroup[]" value="settingGroupD">刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">護理站管理</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="settingStation[]" value="settingStationA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="settingStation[]" value="settingStationB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="settingStation[]" value="settingStationC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="settingStation[]" value="settingStationD">刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">聯絡電話</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="floorPhone[]" value="floorPhoneA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="floorPhone[]" value="floorPhoneB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="floorPhone[]" value="floorPhoneC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="floorPhone[]" value="floorPhoneD">刪除</label>
        </div>
      </div>
      <div class="form-group row">
        <label for="example-text-input" class="col-xs-2 col-form-label">設定</label>
        <div class="col-xs-10 col-md-5">
          <label class="checkbox_label"><input type="checkbox" name="setting[]" value="settingA">檢視</label>
          <label class="checkbox_label"><input type="checkbox" name="setting[]" value="settingB">新增</label>
          <label class="checkbox_label"><input type="checkbox" name="setting[]" value="settingC">修改</label>
          <label class="checkbox_label"><input type="checkbox" name="setting[]" value="settingD">刪除</label>
        </div>
      </div>
      <div class="form-group row"><label for="example-text-input" class="col-xs-2 col-form-label"></label><span id="warningSpan1" class="hidden">請至少選個權限</span></div>
      <div class="form-group">
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