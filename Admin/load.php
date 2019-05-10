<?php
$user_id = '';
$pofread = array();
$pofedit = array();
$pofadd = array();
$pofdel = array();
$basicinfo = array();
$funcsequences = array();
$selectsequences = array();
$theroles = array();
if(isset($_SESSION['userid'])){
	$user_id = $_SESSION['userid'];
}else{
	header("location:../AdminLogin/Logout.php");
}

$funcsequences[0] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM pofnurses as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
$funcsequences[1] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM pofadminuser as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
$funcsequences[2] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM pofadminuserinformation as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
$funcsequences[3] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM pofbulletin as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
$funcsequences[4] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM poffiresetting as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
$funcsequences[5] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM pofsetthinggroup as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
$funcsequences[6] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM pofsettingstation as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
$funcsequences[7] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM poffloorphone as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";
$funcsequences[8] = "SELECT a.readonly, a.addonly, a.editonly, a.delonly FROM pofsetting as a, accounts as b WHERE a.typeofroles = b.role AND b.userid = ?";

foreach($funcsequences as $vals){
	if($stmt = mysqli_prepare($link, $vals)){
		mysqli_stmt_bind_param($stmt, 's', $param_role);
		$param_role = $user_id;
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_bind_result($stmt, $temp_read, $temp_add, $temp_edit, $temp_del);
			while(mysqli_stmt_fetch($stmt)){
				$pofread[] = $temp_read;
				$pofadd[] = $temp_add;
				$pofedit[] = $temp_edit;
				$pofdel[] = $temp_del;
			}
		}
	}
	mysqli_stmt_close($stmt);
}
$funcs[0] = "<li><a href='Nurses.php'><i class='fa fa-user-md'></i>護理人員列表</a></li>";
$funcs[1] = "<li><a href='AdminUser.php'><i class='fa fa-user'></i>管理員列表</a></li>";
$funcs[2] = "<li><a href='AdminUserInformation.php'><i class='fa fa-user-plus'></i>管理員個人資料列表</a></li>";
$funcs[3] = "<li><a href='Bulletin.php'><i class='fa fa-table'></i>病房公告</a></li>";
$funcs[4] = "<li><a href='FireSetting.php'><i class='fa fa-clone'></i>消防編組</a></li>";
$funcs[5] = "<li><a href='SettingGroup.php'><i class='fa fa-users'></i>群組設定</a></li>";
$funcs[6] = "<li><a href='SettingStation.php'><i class='fa fa fa-tv'></i>護理站管理</a></li>";
$funcs[7] = "<li><a href='FloorPhone.php'><i class='fa fa-phone'></i>聯絡電話</a></li>";
$funcs[8] = "<li><a href='Setting.php'><i class='fa fa-cog'></i>設定</a></li>";

$selectsequences[0] = "SELECT role FROM accounts WHERE userid = ?";
$selectsequences[1] = "SELECT username FROM accounts WHERE userid = ?";

foreach($selectsequences as $vals){
	if($stmt = mysqli_prepare($link, $vals)){
		mysqli_stmt_bind_param($stmt, "s", $user_id);
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==1){
				mysqli_stmt_bind_result($stmt, $temp);
				while(mysqli_stmt_fetch($stmt)){
					$basicinfo[] = $temp;
				}
			}else{
				echo '找到不只一筆???';
			}
		}else{
			echo '執行失敗';
		}
	}
	mysqli_stmt_close($stmt);
}
?>