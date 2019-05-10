<?php
require_once ('../connect.php');
session_start();
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
  <style>
     .padding_white_spacing{
    padding-top:100px; 
  }.page_title{
    text-align: center;
    padding-bottom: 20px;
  }
  .page_title h3{
    font-family: Microsoft JhengHei;
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
                include('load.php');
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
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">USER <span class=" fa fa-angle-down"></span>
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
        <div class="page_title"><h3>後臺首頁</h3></div>

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

</body>
</html>