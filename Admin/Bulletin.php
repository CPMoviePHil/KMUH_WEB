<?php
require_once ('../connect.php');
session_start();
include('load.php');
if($pofread[3]){
  
}else{
  echo 
  "<script type='text/javascript'>alert('權限不夠!');window.location.href = 'admin.php';
  </script>";
}
$toppest = $station = $hompage = $title = $sdate = $edate =$content = "";
$station_err = $title_err = $content_err = "";
$toppests = $stations = $homepages = $titles = $dates = array(); 
$announceid = array();
$editid = "";

if($_SESSION["status"] == "add"){
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST['title']))){
      $title_err = "請輸入標題";
    }else{
      $title = trim($_POST['title']);
    }
    if(empty(trim($_POST['content']))){
      $content_err = "請輸入內容";
    }else{
      $content = trim($_POST['content']);
    }
    if(empty($_POST['toppest'])){
      $toppest = 0;
    }else{
      if($_POST['toppest'] == "yes"){
        $toppest = 1;
      }else{
        $toppest = 0;
      }
    }
    if(empty($_POST['homepage'])){
      $homepage = 0;
    }else{
      if($_POST['homepage'] == "yes"){
        $homepage = 1;
      }else{
        $homepage = 0;
      }
    }
    if(empty($_POST['stations'])){
      $station_err = "請選擇權限";
    }else{
      $station = $_POST['stations'];
    }
    if(empty($_POST['edate'])){
      $edate = NULL;
    }else{
      $edate = str_replace("/","-",$_POST['edate']);;
    }
    if(empty($_POST['sdate'])){
      $sdate = "";
    }else{
      $sdate = str_replace("/","-",$_POST['sdate']);;
    }
    if(empty($title_err) && empty($content_err) && empty($station_err)){
      $insertsql = "INSERT INTO bulletin (toppest, station, homepage, title, content, dateofstart, dateofend) VALUES (?,?,?,?,?,?,?)";
      for($x = 0; $x < count($station); $x++){
        if($stmt = mysqli_prepare($link, $insertsql)){
          mysqli_stmt_bind_param($stmt, 'sssssss', $toppest, $station[$x], $homepage, $title, $content, $sdate, $edate);
          if(mysqli_stmt_execute($stmt)){
          }else{
            echo 'failed';
          }
        }
      }
    }
  }
}
if($_SESSION["status"] == "edit"){
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $editid = $_POST["refer"];
    if(empty(trim($_POST['title']))){
      $title_err = "請輸入標題";
    }else{
      $title = trim($_POST['title']);
    }
    if(empty(trim($_POST['content']))){
      $content_err = "請輸入內容";
    }else{
      $content = trim($_POST['content']);
    }
    if(empty($_POST['toppest'])){
      $toppest = 0;
    }else{
      if($_POST['toppest'] == "yes"){
        $toppest = 1;
      }else{
        $toppest = 0;
      }
    }
    if(empty($_POST['homepage'])){
      $homepage = 0;
    }else{
      if($_POST['homepage'] == "yes"){
        $homepage = 1;
      }else{
        $homepage = 0;
      }
    }
    if(empty($_POST['stations'])){
      $station_err = "請選擇權限";
    }else{
      $station = $_POST['stations'];
    }
    if(empty($_POST['edate'])){
      $edate = NULL;
    }else{
      $edate = str_replace("/","-",$_POST['edate']);;
    }
    if(empty($_POST['sdate'])){
      $sdate = "";
    }else{
      $sdate = str_replace("/","-",$_POST['sdate']);;
    }
    if(empty($title_err) && empty($content_err) && empty($station_err)){
      $updatesql = "UPDATE bulletin SET toppest = ?, station = ?, content = ?, homepage = ?, title = ?, dateofstart = ?, dateofend = ? WHERE id = ?";
      if($stmt = mysqli_prepare($link, $updatesql)){
        mysqli_stmt_bind_param($stmt, "ississsi", $toppest, $station[0], $content, $homepage, $title, $sdate, $edate, $editid);
        if(mysqli_stmt_execute($stmt)){

        }else{
          echo 'falied';
        }
      }mysqli_stmt_close($stmt);
    }
  }
}

$getdata = "SELECT id, toppest, station, homepage, title, dateofstart FROM bulletin WHERE station = ?";
$getdataall = "SELECT id, toppest, station, homepage, title, dateofstart FROM bulletin";

if($basicinfo[0] == "最高權限"){
  if($stmt = mysqli_prepare($link, $getdataall)){
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_bind_result($stmt, $temp0, $temp1, $temp2, $temp3, $temp4, $temp5);
      while(mysqli_stmt_fetch($stmt)){
        $announceid[] = $temp0;
        $toppests[] = $temp1;
        $stations[] = $temp2;
        $homepages[] = $temp3;
        $titles[] = $temp4;
        $dates[] = $temp5;
      }
    }else{
      echo 'getdata executed fail';
    }
  }
  mysqli_stmt_close($stmt);
}else{
  if($stmt = mysqli_prepare($link, $getdata)){
    mysqli_stmt_bind_param($stmt, 's', $param_station);
    if($basicinfo[0] == "7A_USER"){
      $param_station = "7A";
    }
    if($basicinfo[0] == "9ES_USER"){
      $param_station = "9ES";
    }
    if($basicinfo[0] == "9EN_USER"){
      $param_station = "9EN";
    }
    if($basicinfo[0] == "10A_USER"){
      $param_station = "10A";
    }
    if($basicinfo[0] == "10ES_USER"){
      $param_station = "10ES";
    }
    if($basicinfo[0] == "13EN_USER"){
      $param_station = "13EN";
    }
    if($basicinfo[0] == "13ES_USER"){
      $param_station = "13ES";
    }
    if($basicinfo[0] == "21ES_USER"){
      $param_station = "21ES";
    }
    if(mysqli_stmt_execute($stmt)){
      mysqli_stmt_bind_result($stmt, $temp0, $temp1, $temp2, $temp3, $temp4, $temp5);
      while(mysqli_stmt_fetch($stmt)){
        $announceid[] = $temp0;
        $toppests[] = $temp1;
        $stations[] = $temp2;
        $homepages[] = $temp3;
        $titles[] = $temp4;
        $dates[] = $temp5;
      }
    }else{
      echo 'getdata executed fail';
    }
  }
  mysqli_stmt_close($stmt);
}

$_SESSION['status'] = "";
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
  <!--JQuery UI datepicker-->

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
  <script src="../AdminCSSJS/JS/jquery.ui.datepicker-zh-TW.js"  type="text/javascript"></script>
  <style>
  .ui-datepicker-calendar th span, .ui-datepicker-week-end span, .ui-datepicker-year, .ui-datepicker-month{
    color: #000!important;
  }
  input{
    color:#0f0f0f;
  }
  input::placeholder{
    color:#a9a9a9;
  }
  textarea::placeholder{
    color:#a9a9a9;
  }
  textarea{
    width:100%;color:#0f0f0f;
  }
  textarea:focus{
    outline: none ;
  }
  #stations{
    padding:0;
  }
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
  td:nth-of-type(1):before { content: "排序:"; }
  td:nth-of-type(2):before { content: "護理站:"; }
  td:nth-of-type(3):before { content: "顯示首頁:"; }
  td:nth-of-type(4):before { content: "標題:"; }
  td:nth-of-type(5):before { content: "更新時間:"; }
  td:nth-of-type(6):before { content: "功能:"; }
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
              <h2><?php echo $basicinfo[1]?></h2>
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
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $basicinfo[1]?> <span class=" fa fa-angle-down"></span>
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
        <div class="page_title"><h3>病房公告</h3></div>
        <div id="thereplace">
          <div class="button_to_add">
            <?php
            if($pofadd[3]){
              echo '<a class="btn btn-primary" data-ajax="true" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-update="#thereplace" href="bulletin/addbulletin.php?val='.$basicinfo[0].'">新增病房公告</a>';
            }?>
          </div>
          <table id="table_id" class="table display">
            <thead>
             <tr>
              <th>排序</th>
              <th>護理站</th>
              <th>顯示首頁</th>
              <th>標題</th>
              <th>更新時間</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php 
            for($x=0;$x<count($titles);$x++){

              if($toppests[$x] == 0 && $homepages[$x] == 0){
                echo '<tr><td></td><td>'.$stations[$x].'</td><td>關閉</td><td>'.$titles[$x].'</td><td>'.$dates[$x].'</td><td>';
              }else if($toppests[$x] == 1 && $homepages[$x] == 0){
                echo '<tr><td>置頂</td><td>'.$stations[$x].'</td><td>關閉</td><td>'.$titles[$x].'</td><td>'.$dates[$x].'</td><td>';
              }else if($toppests[$x] == 1 && $homepages[$x] == 1){
                echo '<tr><td>置頂</td><td>'.$stations[$x].'</td><td>開啟</td><td>'.$titles[$x].'</td><td>'.$dates[$x].'</td><td>';
              }else{
                echo '<tr><td></td><td>'.$stations[$x].'</td><td>開啟</td><td>'.$titles[$x].'</td><td>'.$dates[$x].'</td><td>';
              }
              if($pofedit[3]){
                echo '<a class="btn btn-warning" data-ajax="true" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-update="#thereplace" href="bulletin/editbulletin.php?val='.$announceid[$x].'">修改</a>';
              }
              if($pofdel[3]){
                echo '<a class="btn btn-danger" data-ajax="true" data-ajax-confirm="是否要刪除該筆資料" data-ajax-method="POST"  data-ajax-success="isDeleteSuccess" href="bulletin/delbulletin.php?val='.$announceid[$x].'">刪除</a>';
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