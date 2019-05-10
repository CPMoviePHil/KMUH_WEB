<?php
require_once ('../connect.php');
session_start();
include('load.php');
if($pofread[2]){
  
}else{
  echo 
  "<script type='text/javascript'>alert('權限不夠!');window.location.href = 'admin.php';
  </script>";
}
$accounts = $phones = $emails = $statusofphones = $statusofemails = array();
$email = $phone = $statusofphone = $statusofemail = "";
$email_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $account = $_POST['refer'];
  if(empty($_POST['statusofemail'])){

  }else{
    $insert3 = "UPDATE adminuserinformation SET statusofemail = ? WHERE userid = ?";
    if($stmt = mysqli_prepare($link, $insert3)){
      mysqli_stmt_bind_param($stmt, 'ss', $param_status, $account);
      if($_POST['statusofemail'] === 'yes'){
        $param_status = 1;
      }else{
        $param_status = 0;
      }
      
      if(mysqli_stmt_execute($stmt)){
      }else{
        echo 'wtf3';
      }
    }
    mysqli_stmt_close($stmt);
  }
  if(empty($_POST['statusofphone'])){

  }else{
    $insert4 = "UPDATE adminuserinformation SET statusofphone = ? WHERE userid = ?";
    if($stmt = mysqli_prepare($link, $insert4)){
      mysqli_stmt_bind_param($stmt, 'ss', $param_status, $account);
      if($_POST['statusofphone'] === 'yes'){
        $param_status = 1;
      }else{
        $param_status = 0;
      }
      if(mysqli_stmt_execute($stmt)){
      }else{
        echo 'wtf4';
      }
    }
    mysqli_stmt_close($stmt);
  }
  if(empty(trim($_POST['email']))){
    $email_err = '請輸入信箱';
  }else{
    $select1 = "SELECT email FROM adminuserinformation WHERE BINARY email = ?";
    if($stmt = mysqli_prepare($link, $select1)){
      mysqli_stmt_bind_param($stmt, 's', $param_email);
      $param_email = trim($_POST['email']);
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){
          $email_err =  "此信箱已被採用" ;
        }else{
          $email = trim($_POST['email']);
        }
      }else{
        $email_err = "其他錯誤";
      }
    }
    mysqli_stmt_close($stmt);
  }
  if(empty(trim($_POST['phone']))){

  }else{
    $phone = trim($_POST['phone']);
    $insert2 = "UPDATE adminuserinformation SET phone = ? WHERE userid = ?";
    if($stmt = mysqli_prepare($link, $insert2)){
      mysqli_stmt_bind_param($stmt, 'ss', $param_phone, $param_userid);
      $param_phone = $phone;
      $param_userid = $account;
      if(mysqli_stmt_execute($stmt)){
      }else{
        echo 'wtf1';
      }
    }
    mysqli_stmt_close($stmt);
  }
  if(empty($email_err)){
    $insert1 = "UPDATE adminuserinformation SET email = ? WHERE userid = ?";
    if($stmt = mysqli_prepare($link, $insert1)){
      mysqli_stmt_bind_param($stmt, 'ss', $param_email, $param_userid);
      $param_email = $email;
      $param_userid = $account;
      if(mysqli_stmt_execute($stmt)){
      }else{
        echo 'wtf2';
      }
    }
    mysqli_stmt_close($stmt);
  }
}


$getdata = "SELECT userid, phone, email, statusofphone, statusofemail FROM adminuserinformation";
if($stmt = mysqli_prepare($link, $getdata)){
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_bind_result($stmt, $temp_userid, $temp_phone, $temp_email, $temp_statusofphone, $temp_statusofemail);
    while(mysqli_stmt_fetch($stmt)){
      $accounts[] = $temp_userid;
      $phones[] = $temp_phone;
      $emails[] = $temp_email;
      $statusofphones[] = $temp_statusofphone;
      $statusofemails[] = $temp_statusofemail;
    }
  }else{
    echo 'fuck.......';
  }
}
mysqli_stmt_close($stmt);
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
  input[type="radio"] {
    margin-top: -1px;
    margin-left: 3px;
    vertical-align: middle;
  }
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
  td:nth-of-type(3):before { content: "功能:"; }
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
              <h2>USER</h2>
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
        <div class="page_title"><h3>管理員個人資料</h3></div>
        <div id="thereplace">
          <table id="table_id" class="table display">
            <thead>
             <tr>
              <th>管理員</th>
              <th>手機</th>
              <th>Email</th>
              <th>手機(狀態)</th>
              <th>信箱(狀態)</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php
            for( $x = 0; $x < count($accounts); $x++){
              echo '<tr>
              <td>'.$accounts[$x].'</td><td>'.$phones[$x].'</td><td>'.$emails[$x].'</td>';
              if($statusofphones[$x]){
                echo '<td><input type="checkbox" disabled checked></td>';
              }else{
                echo '<td><input type="checkbox" disabled></td>';
              }
              if($statusofemails[$x]){
                echo '<td><input type="checkbox" disabled checked></td>';
              }else{
                echo '<td><input type="checkbox" disabled></td>';
              }
              echo 
              '<td><a class="btn btn-warning" data-ajax="true" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-update="#thereplace" href="adminuserinformation/editadminuserinformation.php?val='.$accounts[$x].'">修改資料</a>
              <a class="btn btn-warning">測試發送信箱</a>
              </td></tr>';
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
<script type="text/javascript">
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