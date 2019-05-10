<?php
session_start();
require_once('../connect.php');
include('load.php');
if($pofread[5]){
  
}else{
  echo 
  "<script type='text/javascript'>alert('權限不夠!');window.location.href = 'admin.php';
  </script>";
}
$groupname_err = $alltheCheck_err = $stations_err = "";
$groupname = $nurses = $adminuser = $adminuserinformation = $bulletin = $firesetting = $settinggroup = $settingstation = $floorphone = $setting = $statinos = "";
if(isset($_SESSION['status'])){
  if($_SESSION['status'] == 'add'){
    $_SESSION['status'] = '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty(trim($_POST['groupname']))){
        $groupname_err = '請輸入群組名稱';
      }
      else{
        $groupname = trim($_POST['groupname']);
      }
      if((empty($_POST['nurses']))&&(empty($_POST['adminUser']))&&(empty($_POST['adminUserInformation']))&&(empty($_POST['bulletin']))&&(empty($_POST['fireSetting']))&&(empty($_POST['settingGroup']))&&(empty($_POST['settingStation']))&&(empty($_POST['floorPhone']))&&(empty($_POST['setting']))){
        $alltheCheck_err = '請至少勾選一個權限';
      }
      if((empty($_POST['stations']))){
        $stations_err = '請選至少選擇一個護理站';
      }
      if(!((empty($_POST['nurses']))&&(empty($_POST['adminUser']))&&(empty($_POST['adminUserInformationm']))&&(empty($_POST['bulletin']))&&(empty($_POST['fireSetting']))&&(empty($_POST['settingGroup']))&&(empty($_POST['settingStation']))&&(empty($_POST['floorPhone']))&&(empty($_POST['setting']))) && !(empty($_POST['stations'])) && !(empty(trim($_POST['groupname'])))){

        if(empty($groupname_err) && empty($alltheCheck_err) && empty($stations_err)){

          if(!empty($_POST['stations'])){

            $stations = $_POST['stations'];

            $insertSql1 = "INSERT typeofroles (typeofroles,privilegeof7A,privilegeof9ES,privilegeof9EN,privilegeof10A,privilegeof10ES,privilegeof13ES,privilegeof13EN,privilegeof21ES) VALUES (?,?,?,?,?,?,?,?,?)";

            if($insertStmt1 = mysqli_prepare($link, $insertSql1)){
              mysqli_stmt_bind_param($insertStmt1, 'siiiiiiii', $param_typeofroles, $param_7A, $param_9ES, $param_9EN, $param_10A, $param_10ES, $param_13ES, $param_13EN, $param_21ES);
              $param_typeofroles = $groupname;
              foreach($stations as $vals){
                if($vals == '7A'){
                  $param_7A = 1;
                }else if($vals == '9ES'){
                  $param_9ES = 1;
                }else if($vals == '9EN'){
                  $param_9EN = 1;
                }else if($vals == '10A'){
                  $param_10A = 1;
                }else if($vals == '10ES'){
                  $param_10ES = 1;
                }else if($vals == '13ES'){
                  $param_13ES = 1;
                }else if($vals == '13EN'){
                  $param_13EN = 1;
                }else{
                  $param_21ES = 1;
                }
              }
              if(empty($param_7A)){
                $param_7A = 0;
              }
              if(empty($param_9ES)){
                $param_9ES = 0;
              }
              if(empty($param_9EN)){
                $param_9EN = 0;
              }
              if(empty($param_10A)){
                $param_10A = 0;
              }
              if(empty($param_10ES)){
                $param_10ES = 0;
              }
              if(empty($param_13ES)){
                $param_13ES = 0;
              }
              if(empty($param_13EN)){
                $param_13EN = 0;
              }
              if(empty($param_21ES)){
                $param_21ES = 0;
              }
              if(mysqli_stmt_execute($insertStmt1)){
              }

            }
            mysqli_stmt_close($insertStmt1);

            $insert1 = "INSERT pofnurses (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";
            $insert2 = "INSERT pofadminuser (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";
            $insert3 = "INSERT pofadminuserinformation (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";
            $insert4 = "INSERT pofbulletin (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";
            $insert5 = "INSERT poffiresetting (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";
            $insert6 = "INSERT pofsetthinggroup (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";
            $insert7 = "INSERT pofsettingstation (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";
            $insert8 = "INSERT poffloorphone (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";
            $insert9 = "INSERT pofsetting (typeofroles,readonly,addonly,editonly,delonly) VALUES (?,?,?,?,?)";

            if($stmt1 = mysqli_prepare($link, $insert1)){
              mysqli_stmt_bind_param($stmt1, "siiii", $param1_roles, $param1_read, $param1_add, $param1_edit, $param1_del);
              $param1_roles = $groupname;
              if(!empty($_POST['nurses'])){
                $nurses = $_POST['nurses'];
                foreach($nurses as $vals){
                  if($vals == 'nursesA'){
                    $param1_read = 1;
                  }else if($vals == 'nursesB'){
                    $param1_add = 1;
                  }
                  else if($vals == 'nursesC'){
                    $param1_edit = 1;
                  }
                  else{
                    $param1_del = 1;
                  }
                }
                if(empty($param1_read)){
                  $param1_read = 0;
                }
                if(empty($param1_add)){
                  $param1_add = 0;
                }
                if(empty($param1_edit)){
                  $param1_edit = 0;
                }
                if(empty($param1_del)){
                  $param1_del = 0;
                }
              }
              else{
                $param1_read = 0;
                $param1_add = 0;
                $param1_edit = 0;
                $param1_del = 0;
              }
              if(mysqli_stmt_execute($stmt1)){
              }
            }
            mysqli_stmt_close($stmt1);
            if($stmt2 = mysqli_prepare($link, $insert2)){
              mysqli_stmt_bind_param($stmt2, "siiii", $param2_roles, $param2_read, $param2_add, $param2_edit, $param2_del);
              $param2_roles = $groupname;
              if(!empty($_POST['adminUser'])){
                $adminuser = $_POST['adminUser'];
                foreach($adminuser as $vals){
                  if($vals == 'adminUserA'){
                    $param2_read = 1;
                  }else if($vals == 'adminUserB'){
                    $param2_add = 1;
                  }
                  else if($vals == 'adminUserC'){
                    $param2_edit = 1;
                  }
                  else{
                    $param2_del = 1;
                  }
                }
                if(empty($param2_read)){
                  $param2_read = 0;
                }
                if(empty($param1_add)){
                  $param2_add = 0;
                }
                if(empty($param2_edit)){
                  $param2_edit = 0;
                }
                if(empty($param2_del)){
                  $param2_del = 0;
                }
              }
              else{
                $param2_read = 0;
                $param2_add = 0;
                $param2_edit = 0;
                $param2_del = 0;
              }
              if(mysqli_stmt_execute($stmt2)){
              }
            }
            mysqli_stmt_close($stmt2);
            if($stmt3 = mysqli_prepare($link, $insert3)){
              mysqli_stmt_bind_param($stmt3, "siiii", $param3_roles, $param3_read, $param3_add, $param3_edit, $param3_del);
              $param3_roles = $groupname;
              if(!empty($_POST['adminUserInformation'])){
                $adminuserinformation = $_POST['adminUserInformation'];
                foreach($adminuserinformation as $vals){
                  if($vals == 'adminUserInformationA'){
                    $param3_read = 1;
                  }else if($vals == 'adminUserInformationB'){
                    $param3_add = 1;
                  }
                  else if($vals == 'adminUserInformationC'){
                    $param3_edit = 1;
                  }
                  else{
                    $param3_del = 1;
                  }
                }
                if(empty($param3_read)){
                  $param3_read = 0;
                }
                if(empty($param3_add)){
                  $param3_add = 0;
                }
                if(empty($param3_edit)){
                  $param3_edit = 0;
                }
                if(empty($param3_del)){
                  $param3_del = 0;
                }
              }
              else{
                $param3_read = 0;
                $param3_add = 0;
                $param3_edit = 0;
                $param3_del = 0;
              }
              if(mysqli_stmt_execute($stmt3)){
              }
            }
            mysqli_stmt_close($stmt3);
            if($stmt4 = mysqli_prepare($link, $insert4)){
              mysqli_stmt_bind_param($stmt4, "siiii", $param4_roles, $param4_read, $param4_add, $param4_edit, $param4_del);
              $param4_roles = $groupname;
              if(!empty($_POST['bulletin'])){
                $bulletin = $_POST['bulletin'];
                foreach($bulletin as $vals){
                  if($vals == 'bulletinA'){
                    $param4_read = 1;
                  }else if($vals == 'bulletinB'){
                    $param4_add = 1;
                  }
                  else if($vals == 'bulletinC'){
                    $param4_edit = 1;
                  }
                  else{
                    $param4_del = 1;
                  }
                }
                if(empty($param4_read)){
                  $param4_read = 0;
                }
                if(empty($param4_add)){
                  $param4_add = 0;
                }
                if(empty($param4_edit)){
                  $param4_edit = 0;
                }
                if(empty($param4_del)){
                  $param4_del = 0;
                }
              }
              else{
                $param4_read = 0;
                $param4_add = 0;
                $param4_edit = 0;
                $param4_del = 0;
              }
              if(mysqli_stmt_execute($stmt4)){
              }
            }
            mysqli_stmt_close($stmt4);
            if($stmt5 = mysqli_prepare($link, $insert5)){
              mysqli_stmt_bind_param($stmt5, "siiii", $param5_roles, $param5_read, $param5_add, $param5_edit, $param5_del);
              $param5_roles = $groupname;
              if(!empty($_POST['fireSetting'])){
                $firesetting = $_POST['fireSetting'];
                foreach($firesetting as $vals){
                  if($vals == 'fireSettingA'){
                    $param5_read = 1;
                  }else if($vals == 'fireSettingB'){
                    $param5_add = 1;
                  }
                  else if($vals == 'fireSettingC'){
                    $param5_edit = 1;
                  }
                  else{
                    $param5_del = 1;
                  }
                }
                if(empty($param5_read)){
                  $param5_read = 0;
                }
                if(empty($param5_add)){
                  $param5_add = 0;
                }
                if(empty($param5_edit)){
                  $param5_edit = 0;
                }
                if(empty($param5_del)){
                  $param5_del = 0;
                }
              }
              else{
                $param5_read = 0;
                $param5_add = 0;
                $param5_edit = 0;
                $param5_del = 0;
              }
              if(mysqli_stmt_execute($stmt5)){
              }
            }
            mysqli_stmt_close($stmt5);
            if($stmt6 = mysqli_prepare($link, $insert6)){
              mysqli_stmt_bind_param($stmt6, "siiii", $param6_roles, $param6_read, $param6_add, $param6_edit, $param6_del);
              $param6_roles = $groupname;
              if(!empty($_POST['settingGroup'])){
                $settinggroup = $_POST['settingGroup'];
                foreach($settinggroup as $vals){
                  if($vals == 'settingGroupA'){
                    $param6_read = 1;
                  }else if($vals == 'settingGroupB'){
                    $param6_add = 1;
                  }
                  else if($vals == 'settingGroupC'){
                    $param6_edit = 1;
                  }
                  else{
                    $param6_del = 1;
                  }
                }
                if(empty($param6_read)){
                  $param6_read = 0;
                }
                if(empty($param6_add)){
                  $param6_add = 0;
                }
                if(empty($param6_edit)){
                  $param6_edit = 0;
                }
                if(empty($param6_del)){
                  $param6_del = 0;
                }
              }
              else{
                $param6_read = 0;
                $param6_add = 0;
                $param6_edit = 0;
                $param6_del = 0;
              }
              if(mysqli_stmt_execute($stmt6)){
              }
            }
            mysqli_stmt_close($stmt6);
            if($stmt7 = mysqli_prepare($link, $insert7)){
              mysqli_stmt_bind_param($stmt7, "siiii", $param7_roles, $param7_read, $param7_add, $param7_edit, $param7_del);
              $param7_roles = $groupname;
              if(!empty($_POST['settingStation'])){
                $settingstation = $_POST['settingStation'];
                foreach($settingstation as $vals){
                  if($vals == 'settingStationA'){
                    $param7_read = 1;
                  }else if($vals == 'settingStationB'){
                    $param7_add = 1;
                  }
                  else if($vals == 'settingStationC'){
                    $param7_edit = 1;
                  }
                  else{
                    $param7_del = 1;
                  }
                }
                if(empty($param7_read)){
                  $param7_read = 0;
                }
                if(empty($param7_add)){
                  $param7_add = 0;
                }
                if(empty($param7_edit)){
                  $param7_edit = 0;
                }
                if(empty($param7_del)){
                  $param7_del = 0;
                }
              }
              else{
                $param7_read = 0;
                $param7_add = 0;
                $param7_edit = 0;
                $param7_del = 0;
              }
              if(mysqli_stmt_execute($stmt7)){
              }
            }
            mysqli_stmt_close($stmt7);
            if($stmt8 = mysqli_prepare($link, $insert8)){
              mysqli_stmt_bind_param($stmt8, "siiii", $param8_roles, $param8_read, $param8_add, $param8_edit, $param8_del);
              $param8_roles = $groupname;
              if(!empty($_POST['floorPhone'])){
                $floorphone = $_POST['floorPhone'];
                foreach($floorphone as $vals){
                  if($vals == 'floorPhoneA'){
                    $param8_read = 1;
                  }else if($vals == 'floorPhoneB'){
                    $param8_add = 1;
                  }
                  else if($vals == 'floorPhoneC'){
                    $param8_edit = 1;
                  }
                  else{
                    $param8_del = 1;
                  }
                }
                if(empty($param8_read)){
                  $param8_read = 0;
                }
                if(empty($param8_add)){
                  $param8_add = 0;
                }
                if(empty($param8_edit)){
                  $param8_edit = 0;
                }
                if(empty($param8_del)){
                  $param8_del = 0;
                }
              }
              else{
                $param8_read = 0;
                $param8_add = 0;
                $param8_edit = 0;
                $param8_del = 0;
              }
              if(mysqli_stmt_execute($stmt8)){
              }
            }
            mysqli_stmt_close($stmt8);
            if($stmt9 = mysqli_prepare($link, $insert9)){
              mysqli_stmt_bind_param($stmt9, "siiii", $param9_roles, $param9_read, $param9_add, $param9_edit, $param9_del);
              $param9_roles = $groupname;
              if(!empty($_POST['setting'])){
                $setting = $_POST['setting'];
                foreach($setting as $vals){
                  if($vals == 'settingA'){
                    $param9_read = 1;
                  }else if($vals == 'settingB'){
                    $param9_add = 1;
                  }
                  else if($vals == 'settingC'){
                    $param9_edit = 1;
                  }
                  else{
                    $param9_del = 1;
                  }
                }
                if(empty($param9_read)){
                  $param9_read = 0;
                }
                if(empty($param9_add)){
                  $param9_add = 0;
                }
                if(empty($param9_edit)){
                  $param9_edit = 0;
                }
                if(empty($param9_del)){
                  $param9_del = 0;
                }
              }
              else{
                $param9_read = 0;
                $param9_add = 0;
                $param9_edit = 0;
                $param9_del = 0;
              }
              if(mysqli_stmt_execute($stmt9)){
              }
            }
            mysqli_stmt_close($stmt9);
          }
        }
      }
    }
  }
  if($_SESSION['status'] == 'edit'){
    $_SESSION['status'] = '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(empty(trim($_POST['groupname']))){
        $groupname_err = '請輸入群組名稱';
      }
      else{
        $groupname = trim($_POST['groupname']);
      }
      if((empty($_POST['nurses']))&&(empty($_POST['adminUser']))&&(empty($_POST['adminUserInformation']))&&(empty($_POST['bulletin']))&&(empty($_POST['fireSetting']))&&(empty($_POST['settingGroup']))&&(empty($_POST['settingStation']))&&(empty($_POST['floorPhone']))&&(empty($_POST['setting']))){
        $alltheCheck_err = '請至少勾選一個權限';
      }
      if((empty($_POST['stations']))){
        $stations_err = '請選至少選擇一個護理站';
      }
      if(!((empty($_POST['nurses']))&&(empty($_POST['adminUser']))&&(empty($_POST['adminUserInformationm']))&&(empty($_POST['bulletin']))&&(empty($_POST['fireSetting']))&&(empty($_POST['settingGroup']))&&(empty($_POST['settingStation']))&&(empty($_POST['floorPhone']))&&(empty($_POST['setting']))) && !(empty($_POST['stations'])) && !(empty(trim($_POST['groupname'])))){

        if(empty($groupname_err) && empty($alltheCheck_err) && empty($stations_err)){

          if(!empty($_POST['stations'])){

            $stations = $_POST['stations'];

            $updatesql = "UPDATE typeofroles SET typeofroles = ?, privilegeof7A = ?, privilegeof9ES = ?, privilegeof9EN = ? ,privilegeof10A = ? , privilegeof10ES =?, privilegeof13ES = ?, privilegeof13EN = ?,privilegeof21ES = ? WHERE BINARY typeofroles = ?";
            $updatesql2 = "UPDATE pofnurses SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ?  WHERE typeofroles = ?";
            $updatesql3 = "UPDATE pofadminuser SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ? WHERE typeofroles = ?";
            $updatesql4 = "UPDATE pofadminuserinformation SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ?  WHERE typeofroles = ?";
            $updatesql5 = "UPDATE pofbulletin SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ?  WHERE typeofroles = ?";
            $updatesql6 = "UPDATE poffiresetting SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ?  WHERE typeofroles = ?";
            $updatesql7 = "UPDATE pofsetthinggroup SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ?  WHERE typeofroles = ?";
            $updatesql8 = "UPDATE pofsettingstation SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ?  WHERE typeofroles = ?";
            $updatesql9 = "UPDATE poffloorphone SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ?  WHERE typeofroles = ?";
            $updatesql10 = "UPDATE pofsetting SET typeofroles = ?, readonly = ?, addonly = ?, editonly = ?, delonly = ?  WHERE typeofroles = ?";
            

            
            if($updateStmt = mysqli_prepare($link, $updatesql)){
              mysqli_stmt_bind_param($updateStmt, 'siiiiiiiis', $param_update_role, $param_7A, $param_9ES, $param_9EN, $param_10A, $param_10ES, $param_13ES, $param_13EN, $param_21ES, $param_role);
              $param_update_role = trim($_POST['groupname']);
              $param_role = $_SESSION['typeofroles'];
              $stations = $_POST['stations'];
              foreach($stations as $vals){
                if($vals == '7A'){
                  $param_7A = 1;
                }else if($vals == '9ES'){
                  $param_9ES = 1;
                }else if($vals == '9EN'){
                  $param_9EN = 1;
                }else if($vals == '10A'){
                  $param_10A = 1;
                }else if($vals == '10ES'){
                  $param_10ES = 1;
                }else if($vals == '13ES'){
                  $param_13ES = 1;
                }else if($vals == '13EN'){
                  $param_13EN = 1;
                }else{
                  $param_21ES = 1;
                }
              }
              if(empty($param_7A)){
                $param_7A = 0;
              }
              if(empty($param_9ES)){
                $param_9ES = 0;
              }
              if(empty($param_9EN)){
                $param_9EN = 0;
              }
              if(empty($param_10A)){
                $param_10A = 0;
              }
              if(empty($param_10ES)){
                $param_10ES = 0;
              }
              if(empty($param_13ES)){
                $param_13ES = 0;
              }
              if(empty($param_13EN)){
                $param_13EN = 0;
              }
              if(empty($param_21ES)){
                $param_21ES = 0;
              }
              if(mysqli_stmt_execute($updateStmt)){
              }
              else{
                echo 'fuckmehardestway';
              }
            }
            mysqli_stmt_close($updateStmt);

            if($updateStmt2 = mysqli_prepare($link, $updatesql2)){
              mysqli_stmt_bind_param($updateStmt2, 'siiiis', $param2_update_role, $param2_read, $param2_add, $param2_edit, $param2_del, $param2_role);
              $param2_update_role = trim($_POST['groupname']);
              $param2_role = $_SESSION['typeofroles'];
              if(!empty($_POST['nurses'])){
                $nurses = $_POST['nurses'];
                foreach($nurses as $vals){
                  if($vals == 'nursesA'){
                    $param2_read = 1;
                  }else if($vals == 'nursesB'){
                    $param2_add = 1;
                  }
                  else if($vals == 'nursesC'){
                    $param2_edit = 1;
                  }
                  else{
                    $param2_del = 1;
                  }
                }
                if(empty($param2_read)){
                  $param2_read = 0;
                }
                if(empty($param2_add)){
                  $param2_add = 0;
                }
                if(empty($param2_edit)){
                  $param2_edit = 0;
                }
                if(empty($param2_del)){
                  $param2_del = 0;
                }
              }
              else{
                $param2_read = 0;
                $param2_add = 0;
                $param2_edit = 0;
                $param2_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt2)){

              }
              else{
                echo 'fuckeme update failed';
              }
            }
            mysqli_stmt_close($updateStmt2);

            if($updateStmt3 = mysqli_prepare($link, $updatesql3)){
              mysqli_stmt_bind_param($updateStmt3, 'siiiis', $param3_update_role, $param3_read, $param3_add, $param3_edit, $param3_del, $param3_role);
              $param3_update_role = trim($_POST['groupname']);
              $param3_role = $_SESSION['typeofroles'];
              
              if(!empty($_POST['adminUser'])){
                $adminuser = $_POST['adminUser'];
                foreach($adminuser as $vals){
                  if($vals == 'adminUserA'){
                    $param3_read = 1;
                  }else if($vals == 'adminUserB'){
                    $param3_add = 1;
                  }
                  else if($vals == 'adminUserC'){
                    $param3_edit = 1;
                  }
                  else{
                    $param3_del = 1;
                  }
                }
                if(empty($param3_read)){
                  $param3_read = 0;
                }
                if(empty($param3_add)){
                  $param3_add = 0;
                }
                if(empty($param3_edit)){
                  $param3_edit = 0;
                }
                if(empty($param3_del)){
                  $param3_del = 0;
                }
              }
              else{
                $param3_read = 0;
                $param3_add = 0;
                $param3_edit = 0;
                $param3_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt3)){
              }
              else{
                echo 'fuckeme update failed3';
              }
            }
            mysqli_stmt_close($updateStmt3);

            if($updateStmt4 = mysqli_prepare($link, $updatesql4)){
              mysqli_stmt_bind_param($updateStmt4, 'siiiis', $param4_update_role, $param4_read, $param4_add, $param4_edit, $param4_del, $param4_role);
              $param4_update_role = trim($_POST['groupname']);
              $param4_role = $_SESSION['typeofroles'];
              
              if(!empty($_POST['adminUserInformation'])){
                $adminuserinformation = $_POST['adminUserInformation'];
                foreach($adminuserinformation as $vals){
                  if($vals == 'adminUserInformationA'){
                    $param4_read = 1;
                  }else if($vals == 'adminUserInformationB'){
                    $param4_add = 1;
                  }
                  else if($vals == 'adminUserInformationC'){
                    $param4_edit = 1;
                  }
                  else{
                    $param4_del = 1;
                  }
                }
                if(empty($param4_read)){
                  $param4_read = 0;
                }
                if(empty($param4_add)){
                  $param4_add = 0;
                }
                if(empty($param4_edit)){
                  $param4_edit = 0;
                }
                if(empty($param4_del)){
                  $param4_del = 0;
                }
              }
              else{
                $param4_read = 0;
                $param4_add = 0;
                $param4_edit = 0;
                $param4_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt4)){
              }
              else{
                echo 'fuckeme update failed4';
              }
            }
            mysqli_stmt_close($updateStmt4);

            if($updateStmt5 = mysqli_prepare($link, $updatesql5)){
              mysqli_stmt_bind_param($updateStmt5, 'siiiis', $param5_update_role, $param5_read, $param5_add, $param5_edit, $param5_del, $param5_role);
              $param5_update_role = trim($_POST['groupname']);
              $param5_role = $_SESSION['typeofroles'];
              
              if(!empty($_POST['bulletin'])){
                $bulletin = $_POST['bulletin'];
                foreach($bulletin as $vals){
                  if($vals == 'bulletinA'){
                    $param5_read = 1;
                  }else if($vals == 'bulletinB'){
                    $param5_add = 1;
                  }
                  else if($vals == 'bulletinC'){
                    $param5_edit = 1;
                  }
                  else{
                    $param5_del = 1;
                  }
                }
                if(empty($param5_read)){
                  $param5_read = 0;
                }
                if(empty($param5_add)){
                  $param5_add = 0;
                }
                if(empty($param5_edit)){
                  $param5_edit = 0;
                }
                if(empty($param5_del)){
                  $param5_del = 0;
                }
              }
              else{
                $param5_read = 0;
                $param5_add = 0;
                $param5_edit = 0;
                $param5_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt5)){
              }
              else{
                echo 'fuckeme update failed5';
              }
            }
            mysqli_stmt_close($updateStmt5);

            if($updateStmt6 = mysqli_prepare($link, $updatesql6)){
              mysqli_stmt_bind_param($updateStmt6, 'siiiis', $param6_update_role, $param6_read, $param6_add, $param6_edit, $param6_del, $param6_role);
              $param6_update_role = trim($_POST['groupname']);
              $param6_role = $_SESSION['typeofroles'];
              
              if(!empty($_POST['fireSetting'])){
                $firesetting = $_POST['fireSetting'];
                foreach($firesetting as $vals){
                  if($vals == 'fireSettingA'){
                    $param6_read = 1;
                  }else if($vals == 'fireSettingB'){
                    $param6_add = 1;
                  }
                  else if($vals == 'fireSettingC'){
                    $param6_edit = 1;
                  }
                  else{
                    $param6_del = 1;
                  }
                }
                if(empty($param6_read)){
                  $param6_read = 0;
                }
                if(empty($param6_add)){
                  $param6_add = 0;
                }
                if(empty($param6_edit)){
                  $param6_edit = 0;
                }
                if(empty($param6_del)){
                  $param6_del = 0;
                }
              }
              else{
                $param6_read = 0;
                $param6_add = 0;
                $param6_edit = 0;
                $param6_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt6)){
              }
              else{
                echo 'fuckeme update failed6';
              }
            }
            mysqli_stmt_close($updateStmt6);
            if($updateStmt7 = mysqli_prepare($link, $updatesql7)){
              mysqli_stmt_bind_param($updateStmt7, 'siiiis', $param7_update_role, $param7_read, $param7_add, $param7_edit, $param7_del, $param7_role);
              $param7_update_role = trim($_POST['groupname']);
              $param7_role = $_SESSION['typeofroles'];
              
              if(!empty($_POST['settingGroup'])){
                $settinggroup = $_POST['settingGroup'];
                foreach($settinggroup as $vals){
                  if($vals == 'settingGroupA'){
                    $param7_read = 1;
                  }else if($vals == 'settingGroupB'){
                    $param7_add = 1;
                  }
                  else if($vals == 'settingGroupC'){
                    $param7_edit = 1;
                  }
                  else{
                    $param7_del = 1;
                  }
                }
                if(empty($param7_read)){
                  $param7_read = 0;
                }
                if(empty($param7_add)){
                  $param7_add = 0;
                }
                if(empty($param7_edit)){
                  $param7_edit = 0;
                }
                if(empty($param7_del)){
                  $param7_del = 0;
                }
              }
              else{
                $param7_read = 0;
                $param7_add = 0;
                $param7_edit = 0;
                $param7_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt7)){
              }
              else{
                echo 'fuckeme update failed7';
              }
            }
            mysqli_stmt_close($updateStmt7);
            if($updateStmt8 = mysqli_prepare($link, $updatesql8)){
              mysqli_stmt_bind_param($updateStmt8, 'siiiis', $param8_update_role, $param8_read, $param8_add, $param8_edit, $param8_del, $param8_role);
              $param8_update_role = trim($_POST['groupname']);
              $param8_role = $_SESSION['typeofroles'];
              
              if(!empty($_POST['settingStation'])){
                $settingstation = $_POST['settingStation'];
                foreach($settingstation as $vals){
                  if($vals == 'settingStationA'){
                    $param8_read = 1;
                  }else if($vals == 'settingStationB'){
                    $param8_add = 1;
                  }
                  else if($vals == 'settingStationC'){
                    $param8_edit = 1;
                  }
                  else{
                    $param8_del = 1;
                  }
                }
                if(empty($param8_read)){
                  $param8_read = 0;
                }
                if(empty($param8_add)){
                  $param8_add = 0;
                }
                if(empty($param8_edit)){
                  $param8_edit = 0;
                }
                if(empty($param8_del)){
                  $param8_del = 0;
                }
              }
              else{
                $param8_read = 0;
                $param8_add = 0;
                $param8_edit = 0;
                $param8_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt8)){
              }
              else{
                echo 'fuckeme update failed8';
              }
            }
            mysqli_stmt_close($updateStmt8);

            if($updateStmt9 = mysqli_prepare($link, $updatesql9)){
              mysqli_stmt_bind_param($updateStmt9, 'siiiis', $param9_update_role, $param9_read, $param9_add, $param9_edit, $param9_del, $param9_role);
              $param9_update_role = trim($_POST['groupname']);
              $param9_role = $_SESSION['typeofroles'];
              
              if(!empty($_POST['floorPhone'])){
                $floorphone = $_POST['floorPhone'];
                foreach($floorphone as $vals){
                  if($vals == 'floorPhoneA'){
                    $param9_read = 1;
                  }else if($vals == 'floorPhoneB'){
                    $param9_add = 1;
                  }
                  else if($vals == 'floorPhoneC'){
                    $param9_edit = 1;
                  }
                  else{
                    $param9_del = 1;
                  }
                }
                if(empty($param9_read)){
                  $param9_read = 0;
                }
                if(empty($param9_add)){
                  $param9_add = 0;
                }
                if(empty($param9_edit)){
                  $param9_edit = 0;
                }
                if(empty($param9_del)){
                  $param9_del = 0;
                }
              }
              else{
                $param9_read = 0;
                $param9_add = 0;
                $param9_edit = 0;
                $param9_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt9)){
              }
              else{
                echo 'fuckeme update failed9';
              }
            }
            mysqli_stmt_close($updateStmt9);

            if($updateStmt10 = mysqli_prepare($link, $updatesql10)){
              mysqli_stmt_bind_param($updateStmt10, 'siiiis', $param10_update_role, $param10_read, $param10_add, $param10_edit, $param10_del, $param10_role);
              $param10_update_role = trim($_POST['groupname']);
              $param10_role = $_SESSION['typeofroles'];
              
              if(!empty($_POST['setting'])){
                $setting = $_POST['setting'];
                foreach($setting as $vals){
                  if($vals == 'settingA'){
                    $param10_read = 1;
                  }else if($vals == 'settingB'){
                    $param10_add = 1;
                  }
                  else if($vals == 'settingC'){
                    $param10_edit = 1;
                  }
                  else{
                    $param10_del = 1;
                  }
                }
                if(empty($param10_read)){
                  $param10_read = 0;
                }
                if(empty($param10_add)){
                  $param9_add = 0;
                }
                if(empty($param10_edit)){
                  $param10_edit = 0;
                }
                if(empty($param10_del)){
                  $param10_del = 0;
                }
              }
              else{
                $param10_read = 0;
                $param10_add = 0;
                $param10_edit = 0;
                $param10_del = 0;
              }
              if(mysqli_stmt_execute($updateStmt10)){
              }
              else{
                echo 'fuckeme update failed10';
              }
            }
            mysqli_stmt_close($updateStmt10);
          }
        }
      }
    }

  }
}

$_SESSION['status'] = '';

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" >
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <title>邦城科技股份有限公司-後臺系統</title>

  <!-- Bootstrap -->
  <link href="../AdminCSSJS/CSS/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../AdminCSSJS/CSS/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../AdminCSSJS/CSS/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../AdminCSSJS/CSS/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="../AdminCSSJS/CSS/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="../AdminCSSJS/CSS/jqvmap.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="../AdminCSSJS/CSS/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../AdminCSSJS/CSS/custom.min.css" rel="stylesheet">
  

  <link href="../AdminCSSJS/DataTables/datatables.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
  <script /js/jquery.unobtrusive-ajax.js></script>
  <style>
  span.help-block{
    color:#a80000;
  }
  #warningSpan1, #warningSpan2{
    text-align: center;
    color:#a80000;
  }
  .right_col th{
    text-align: center;   
  }
  .right_col td{
    text-align: center;   
  }

  button.btnToSubmit{
    margin: 0 auto;
  }
  .padding_white_spacing{
    padding-top:100px; 
  }
  .page_title{
    text-align: center;
    padding-bottom: 20px;
  }
  .page_title h3{
    font-family: Microsoft JhengHei;
  }
  .button_to_add{
    padding-bottom: 15px;
  }
  #table_id  td, th {
    vertical-align: middle;
    color:#000;
  }
  label.checkbox_label input[type="checkbox"]{
    position: relative;
    vertical-align: middle;
    bottom: 1px;
  }
  input[type="checkbox"]{
    margin-right:5px;
    margin-left:15px;
  }
  .col-xs-10{
    padding:0;
  }
    /* 
Max width before this PARTICULAR table gets nasty
This query will take effect for any screen smaller than 760px
and also iPads specifically.
*/
@media 
only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {
  div.right_col{
    padding-left:0 !important;
    padding-right:0 !important;
  }

  /* Force table to not be like tables anymore */
  table, thead, tbody, th, td, tr { 
    display: block; 
  }
  
  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr { 
    position: absolute;
    border:none;
    top: -9999px;
    left: -9999px;
  }
  tbody tr{
    border:none;
  }
  

  table tbody tr td { 
    /* Behave  like a "row" */
    border: none !important;
    position: relative;
    padding-left: 50%; 
    text-align: left !important;
    margin:3%;
  }
  
  td:before { 
    /* Now like a table header */
    
    /* Top/left values mimic padding */
    width: 70%; 
    padding-right: 20px; 
    white-space: nowrap;
  }
  
  /*
  Label the data
  */
  td:nth-of-type(1):before { content: "群組名稱:"; }
  td:nth-of-type(2):before { content: "功能:"; }
}
</style>



</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_info">
              <span>歡迎光臨</span>
              <h2><?php echo $basicinfo[1];?></h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <!-- 旁邊sidebar的功能 -->
                <?php 
                //include('load.php');
                foreach(array_combine($funcs, $pofread) as $vals => $vals1){
                  if($vals1){
                    echo $vals;
                  }
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $basicinfo[1];?> <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="../AdminLogin/Logout.php"><i class="fa fa-sign-out pull-right"></i>登出</a></li>
                </ul>
              </li>

            </ul>
          </nav>
        </div>
      </div>

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="padding_white_spacing"></div>
        <div class="page_title"><h3>群組設定</h3></div>
        <div id="theReplace">

          <div class="button_to_add">
            <?php 
            if($pofadd[5]){
              echo '<a class="btn btn-primary" data-ajax="true" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-update="#theReplace" href="settinggroup/addSettingGroup.php">新增群組設定</a>';
            }
            ?>
            <span class="help-block"><?php echo $groupname_err.' '.$alltheCheck_err.' '.$stations_err; ?></span>
          </div>
          <table id="table_id" class="table display">
            <thead>
             <tr>
              <th>群組名稱</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $groups = array();
            $groupsData = '';
            $getData = "SELECT typeofroles FROM typeofroles";
            if($dStmt = mysqli_prepare($link, $getData)){
              if(mysqli_stmt_execute($dStmt)){
                mysqli_stmt_bind_result($dStmt, $temp_groups);

                while(mysqli_stmt_fetch($dStmt)){
                  $groups[] = $temp_groups;
                }
              }
              else{
                echo 'fuckme';
              }
            }
            mysqli_stmt_close($dStmt);
            foreach($groups as $vals){
              if($pofedit[5]){
                echo "<tr>"."<td>".$vals."</td>"."<td>"."<a class='btn btn-warning' data-ajax='true' data-ajax-method='POST' data-ajax-mode='replace' data-ajax-update='#theReplace' href='settinggroup/editsettinggroup.php?val=".$vals."'>"."修改"."</a>";
              }
              if($pofdel[5]){
                echo "<a class='btn btn-danger' data-ajax='true' data-ajax-confirm='是否要刪除該筆資料' data-ajax-method='POST' data-ajax-success='isDeleteSuccess' href='settinggroup/delsettinggroup.php?val=".$vals."'>"."刪除"."</a>"."</td>"."</tr>";
              }
            }
            ?>
          </tbody>
        </table>

      </div>
    </div>
    <footer>
      <div class="pull-right">
        © 2016 邦城科技股份有限公司 | Design by: www.bungcheng.meworks.co
      </div>
      <div class="clearfix"></div>
    </footer>
    <!-- /footer content -->
  </div>
</div>

<script src="../AdminCSSJS/JS/jquery.min.js"></script>
<script src="../AdminCSSJS/JS/bootstrap.min.js"></script>
<script src="../AdminCSSJS/JS/fastclick.js"></script>
<script src="../AdminCSSJS/JS/nprogress.js"></script>
<script src="../AdminCSSJS/JS/bootstrap-progressbar.min.js"></script>
<script src="../AdminCSSJS/JS/custom.min.js"></script>
<script src="../AdminCSSJS/JS/dropdown.js"></script>
<script src="../AdminCSSJS/DataTables/datatables.min.js" type="text/javascript"></script>
<script src="../AdminCSSJS/JS/jquery.unobtrusive-ajax.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
<script type='text/javascript'>
  function isDeleteSuccess() {
    $(this).parent().parent().remove();
  }
</script>
<script>
  $(document).ready( function (){
    $("tr th").css("text-align", "center");
    $("tr td").css("text-align", "center");
    $('#table_id').DataTable({

      responsive: true,
      autoWidth:true,
      "oLanguage":{
        "sSearch":"尋找:",
        "sLengthMenu":"顯示 _MENU_ 項結果",
        "sInfo":"顯示第 _START_ 至 _END_ 項结果，共 _TOTAL_ 項",
        "sInfoEmpty":"顯示第 0 至 0 項结果",
        "sInfoFiltered":"(資料表總共有 _MAX_ 項紀錄)",
        "oPaginate": {
          "sPrevious": "上一頁",
          "sNext":"下一頁"
        },
        "sZeroRecords":"對不起，找不到該關鍵字的紀錄"
      }

    });
  });

</script>


</body>
</html>