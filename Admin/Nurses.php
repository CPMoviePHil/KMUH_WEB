<?php
require_once ('../connect.php');
session_start();
include('load.php');
if($pofread[0]){
  
}else{
  echo 
  "<script type='text/javascript'>alert('權限不夠!');window.location.href = 'admin.php';
  </script>";
}
$account = $name = $password = $station = ""; 
$account_err = $name_err = $password_err = $station_err = "";
$account_unchange = "";
$username = $accounts_nurses = $area = array();
if($_SESSION['status'] == "add"){
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST['account']))){
      $account_err = "請輸入帳號";
    }else{
      $selectsql = "SELECT accounts_nurses FROM accounts_nurses WHERE BINARY accounts_nurses = ?";
      if(!empty(trim($_POST['account']))){
        if($stmt = mysqli_prepare($link, $selectsql)){
          mysqli_stmt_bind_param($stmt, 's', $param_account);
          $param_account = trim($_POST['account']);
          if(mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            if(mysqli_stmt_num_rows($stmt) == 1){
              $account_err = "此帳號已被採用";
            }
            else{
              $account = trim($_POST['account']);
            }
          }
        }
        mysqli_stmt_close($stmt);
      }
    }
    if(empty(trim($_POST['username']))){
      $name_err = "請輸入姓名";
    }else{
      $name = trim($_POST['username']);
    }
    if(empty(trim($_POST['password']))){
      $password_err = "請輸入密碼";
    }elseif(strlen(trim($_POST['password'])) < 5){
      $password_err = "密碼至少5碼";
    }else{
      $password = trim($_POST["password"]);
    }
    if((empty($_POST['stations']))){
      $station_err = '請選至少選擇一個護理站';
    }else{
      $station = $_POST['stations'];
    }
    if(empty($account_err) && empty($name_err) && empty($password_err) && empty($station_err)){
      $insertsql1 = "INSERT INTO nurses (accounts_nurses, username, area) VALUES (?,?,?)";
      $insertsql2 = "INSERT INTO accounts_nurses (accounts_nurses, username, password) VALUES (?,?,?)";
      if($stmt = mysqli_prepare($link, $insertsql1)){
        mysqli_stmt_bind_param($stmt, "sss", $param_account, $param_name, $param_area);
        $param_acount = $account;
        $param_name = $name;
        $param_area = implode(",",$station);
        if(mysqli_stmt_execute($stmt)){
        }
      }
      mysqli_stmt_close($stmt);
      if($stmt = mysqli_prepare($link, $insertsql2)){
        mysqli_stmt_bind_param($stmt, "sss", $param_account, $param_name, $param_password);
        $param_acount = $account;
        $param_name = $name;
        $param_password = $password;
        if(mysqli_stmt_execute($stmt)){
        }
      }
      mysqli_stmt_close($stmt);
    }
  }
}
if($_SESSION['status'] == "edit"){

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $account_unchange = $_POST['refer'];
    if(empty(trim($_POST['account']))){
      $account_err = "請輸入帳號";
    }else{
      if(trim($_POST['account']) == $account_unchange){
        $account = $account_unchange;
      }else{
        $selectsql = "SELECT accounts_nurses FROM accounts_nurses WHERE BINARY accounts_nurses = ?";
        if(!empty(trim($_POST['account']))){
          if($stmt = mysqli_prepare($link, $selectsql)){
            mysqli_stmt_bind_param($stmt, 's', $param_account);
            $param_account = trim($_POST['account']);
            if(mysqli_stmt_execute($stmt)){
              mysqli_stmt_store_result($stmt);
              if(mysqli_stmt_num_rows($stmt) == 1){
                $account_err = "此帳號已被採用";
              }
              else{
                $account = trim($_POST['account']);
              }
            }
          }
          mysqli_stmt_close($stmt);
        }
      }
    }
    if(empty(trim($_POST['username']))){
      $name_err = "請輸入姓名";
    }else{
      $name = trim($_POST['username']);
    }
    if(empty(trim($_POST['password']))){
      $password_err = "請輸入密碼";
    }elseif(strlen(trim($_POST['password'])) < 5){
      $password_err = "密碼至少5碼";
    }else{
      $password = trim($_POST["password"]);
    }
    if((empty($_POST['stations']))){
      $station_err = '請選至少選擇一個護理站';
    }else{
      $station = $_POST['stations'];
    }
    if(empty($account_err) && empty($name_err) && empty($password_err) && empty($station_err)){
      $update1 = "UPDATE accounts_nurses SET accounts_nurses = ?, username =?, password = ? WHERE accounts_nurses = ?";
      $update2 = "UPDATE nurses SET accounts_nurses = ?, username = ?, area = ? WHERE accounts_nurses = ?";
      if($stmt = mysqli_prepare($link, $update1)){
        mysqli_stmt_bind_param($stmt, "ssss", $param_account, $param_username, $param_password, $param_unchange);
        $param_account = $account;
        $param_username = $name;
        $param_password = $password;
        $param_unchange = $account_unchange;
        if(mysqli_stmt_execute($stmt)){

        }
      }
      mysqli_stmt_close($stmt);
      if($stmt = mysqli_prepare($link, $update2)){
        mysqli_stmt_bind_param($stmt, "ssss", $param_account, $param_username, $param_area, $param_unchange);
        $param_account = $account;
        $param_username = $name;
        $param_area = implode(",",$station);
        $param_unchange = $account_unchange;
        if(mysqli_stmt_execute($stmt)){

        }
      }
      mysqli_stmt_close($stmt);
    }
  }
}
$_SESSION['status'] == "";
$getdata = "SELECT username, accounts_nurses, area FROM nurses";
if($stmt = mysqli_prepare($link, $getdata)){
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_bind_result($stmt, $temp_name, $temp_accounts, $temp_area);
    while(mysqli_stmt_fetch($stmt)){
      $username[] = $temp_name;
      $accounts_nurses[] = $temp_accounts;
      $area[] = $temp_area;
    }
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
  span{
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
  .col-form-label{
    text-align: center;
  }
    /* 
  }
  }
  }
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
  td:nth-of-type(1):before { content: "姓名:"; }
  td:nth-of-type(2):before { content: "帳號:"; }
  td:nth-of-type(3):before { content: "區域:"; }
  td:nth-of-type(4):before { content: "功能:"; }
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
        <div class="page_title"><h3>護理人員資料</h3></div>
        <div id="thereplace">
          <div class="button_to_add">
            <?php
            if($pofadd[0]){
              echo '<a class="btn btn-primary" data-ajax="true" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-update="#thereplace" href="nurses/addnurses.php">新增護理人員帳號</a>';
            }
            ?>
            <span><?php echo $account_err.' '.$name_err.' '.$password_err.' '.$station_err ?></span>
          </div>
          <table id="table_id" class="table display">
            <thead>
             <tr>
              <th>姓名</th>
              <th>帳號</th>
              <th>區域</th>
              <th></th></tr>
            </thead>
            <tbody>
              <?php
              for($x = 0; $x < count($username); $x++){
                echo '<tr><td>'.$username[$x].'</td><td>'.$accounts_nurses[$x].'</td><td>'.$area[$x].'</td><td>';
                if($pofedit[0]){
                  echo '<a class="btn btn-warning" data-ajax="true" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-update="#thereplace" href="nurses/editnurses.php?val='.$accounts_nurses[$x].'">修改</a>';
                }
                if($pofdel[0]){
                  echo '<a class="btn btn-danger" data-ajax="true" data-ajax-confirm="是否要刪除該筆資料" data-ajax-method="POST"  data-ajax-success="isDeleteSuccess" href="nurses/delnurses.php?val='.$accounts_nurses[$x].'">刪除</a>';
                }
                echo '</td></tr>';
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
  <script type="text/javascript">
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