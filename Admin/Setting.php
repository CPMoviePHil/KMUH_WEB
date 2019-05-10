<?php
require_once ('../connect.php');
session_start();
include('load.php');
if($pofread[8]){

}else{
  echo 
  "<script type='text/javascript'>alert('權限不夠!');window.location.href = 'admin.php';
  </script>";
}
$ip = $ip1 = $ip2 = $ip3 = $ip4 = $ip1s = $ip2s = $ip3s = $ip4s = $today = "";
$insert_err = $del_err = "";
$id = $deletetime = $emailsent = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
 if($_SESSION["status"] == "add"){
   if($_POST["refer"] == "1"){
    $ip1 = $_POST["ip1"];
    $ip2 = $_POST["ip2"];
    $ip3 = $_POST["ip3"];
    $ip4 = $_POST["ip4"];
    $ip = ip2long($ip1.'.'.$ip2.'.'.$ip3.'.'.$ip4);
    $today = date("Y-m-d");
    $checkip = "SELECT ipaddress FROM iptable WHERE ipaddress = ?";
    if($stmt = mysqli_prepare($link, $checkip)){
      mysqli_stmt_bind_param($stmt, 'i', $ip);
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){
          echo "<script type='text/javascript'>alert('此IP ".long2ip($ip)."以重複!')</script>";
          $insert_err = "此IP以重複";
        }
      }else{
        echo "faillll";
        $insert_err = "wtf";
      }
      mysqli_stmt_close($stmt);
    }
    if(empty($insert_err)){
      $insertsql = "INSERT INTO iptable (ipaddress, insertdate) VALUES (?,?)";
      if($stmt = mysqli_prepare($link, $insertsql)){
        mysqli_stmt_bind_param($stmt, 'is', $ip, $today);
        if(mysqli_stmt_execute($stmt)){
          echo "<script type='text/javascript'>alert('此IP ".long2ip($ip)."新增成功!')</script>";
        }else{
          echo "go fuckyourself";
        }
      }
      mysqli_stmt_close($stmt);
    }
  }else{
    $ip1 = $_POST["ip1"];
    $ip2 = $_POST["ip2"];
    $ip3 = $_POST["ip3"];
    $ip4 = $_POST["ip4"];
    $ip1s = $_POST["ip1s"];
    $ip2s = $_POST["ip2s"];
    $ip3s = $_POST["ip3s"];
    $ip4s = $_POST["ip4s"];
    $today = date("Y-m-d");
    for($x = 0; $x < ($ip4s-$ip4); $x++){
      $insertsql = "INSERT INTO iptable (ipaddress, insertdate) VALUES (?,?)";
      if($stmt = mysqli_prepare($link, $insertsql)){
        $tempip4s = $ip4 + $x;
        $ips = ip2long($ip1s.'.'.$ip2s.'.'.$ip3s.'.'.$tempip4s);
        mysqli_stmt_bind_param($stmt, 'is', $ips, $today);
        if(mysqli_stmt_execute($stmt)){

        }else{
          $insert_err = "儲存失敗";
          echo "go fuckyourself";
        }
      }
      mysqli_stmt_close($stmt);
    }
    if(!empty($insert_err)){
      echo "<script type='text/javascript'>alert('範圍IP新增失敗!')</script>";
    }
  }
}
if($_SESSION["status"] == "del"){
  if($_POST["del"] == "1"){
    $ip1 = $_POST["dip1"];
    $ip2 = $_POST["dip2"];
    $ip3 = $_POST["dip3"];
    $ip4 = $_POST["dip4"];
    $ip = ip2long($ip1.'.'.$ip2.'.'.$ip3.'.'.$ip4);
    $deldata = "DELETE FROM iptable WHERE ipaddress = ?";
    if($stmt = mysqli_prepare($link, $deldata)){
      mysqli_stmt_bind_param($stmt, "i", $ip);
      if(mysqli_stmt_execute($stmt)){
        echo "<script type='text/javascript'>alert('此IP ".long2ip($ip)."以刪除!')</script>";
      }else{
        $del_err = "刪除失敗";
      }
    }
    mysqli_stmt_close($stmt);
    if(!empty($del_err)){
      echo "<script type='text/javascript'>alert('此IP ".long2ip($ip)."刪除失敗!')</script>";
    }
  }else{
    $ip1 = $_POST["dip1"];
    $ip2 = $_POST["dip2"];
    $ip3 = $_POST["dip3"];
    $ip4 = $_POST["dip4"];
    $ip1s = $_POST["dip1s"];
    $ip2s = $_POST["dip2s"];
    $ip3s = $_POST["dip3s"];
    $ip4s = $_POST["dip4s"];
    $today = date("Y-m-d");
    for($x = 0; $x < ($ip4s-$ip4); $x++){
      $delsql = "DELETE FROM iptable WHERE ipaddress = ?";
      if($stmt = mysqli_prepare($link, $delsql)){
        $tempip4s = $ip4 + $x;
        $ips = ip2long($ip1s.'.'.$ip2s.'.'.$ip3s.'.'.$tempip4s);
        mysqli_stmt_bind_param($stmt, 'i', $ips);
        if(mysqli_stmt_execute($stmt)){

        }else{
          $del_err = $del_err." ".$ips." ";
          echo "wtf".$x;
        }
      }
      mysqli_stmt_close($stmt);
    }
    if(!empty($del_err)){
      echo "<script type='text/javascript'>alert('".$del_err."刪除失敗')</script>";
    }else{
      echo "<script type='text/javascript'>alert('此IP範圍刪除成功!')</script>";
    }
  }
}

}
$iplists = array();
$getdata = "SELECT ipaddress FROM iptable";
if($stmt = mysqli_prepare($link, $getdata)){
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_bind_result($stmt, $temp);
    while(mysqli_stmt_fetch($stmt)){
      $iplists[] = long2ip($temp);
    }
  }
  else{
    echo 'really fuck me';
  }
}
mysqli_stmt_close($stmt);
$getdata2 = "SELECT deletetime, emailerror FROM setting WHERE id = ?";
if($stmt = mysqli_prepare($link, $getdata2)){
  $id = 1;
  mysqli_stmt_bind_param($stmt, 'i', $id);
  if(mysqli_stmt_execute($stmt)){
    mysqli_stmt_bind_result($stmt, $temp, $temp2);
    while(mysqli_stmt_fetch($stmt)){
      $deletetime = $temp;
      $emailsent = $temp2;
    }
  }
  else{
    echo 'really fuck me';
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
  .col-form-label{
    text-align:center; margin-top: 0.5em; padding:0;
  }
  #DeleteTime, #EmailSent{
    width:5em;
  }
  .btntoedit{
   margin-left: 20px;
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
        <div class="page_title"><h3>設定</h3></div>
        <div id="thereplace">
          <div class="form-group <?php if(!$pofedit[8]){echo 'hidden';}?>" >
            <div class="form-group row">
              <label for="example-text-input" class="col-xs-12 col-md-2 col-form-label">刪除資料庫時間(天數)</label>
              <input class="form-control col-xs-3" id="DeleteTime" name="DeleteTime" placeholder="單位:天" type="number" min="1" value = "<?php echo $deletetime;?>">
              <a class="btn btn-primary btntoedit" id="btntodeletetime" href="javascript:void{0}">修改</a>
            </div>
          </div>
          <div class="form-group <?php if(!$pofedit[8]){echo 'hidden';}?>">
            <div class="form-group row">
              <label for="example-text-input" class="col-xs-12 col-md-2 col-form-label">Email錯誤可允許次數</label>
              <input class="form-control col-xs-3" id="EmailSent" name="EmailSent" type="number" min="1" value = "<?php echo $emailsent;?>">
              <a class="btn btn-primary btntoedit" id="btntoemailsent" href="javascript:void{0}">修改</a>
            </div>
          </div>
          <div class="page_title"><h3>IP範圍</h3></div>
          <div class="form-group <?php if(!$pofadd[8]){echo 'hidden';}?>" >
            <div class="form-group row">
              <label for="example-text-input" class="col-xs-12 col-md-2 col-form-label">選擇輸入IP方式</label>
              <select id="addipsetting" name="addipsetting">
                <option value="single">單筆新增</option>
                <option value="multiple">範圍新增</option>
              </select>
              <a class="btn btn-primary btntoedit" data-ajax="true" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-update="#thereplace" id="addbtn">確定</a>
            </div>
          </div>
          <div class="form-group">
            <div class="form-group row <?php if(!$pofdel[8]){echo 'hidden';}?>">
              <label for="example-text-input" class="col-xs-12 col-md-2 col-form-label">選擇刪除IP方式</label>
              <select id="delipsetting" name="delipsetting">
                <option value="single">單筆刪除</option>
                <option value="multiple">範圍刪除</option>
              </select>
              <a class="btn btn-primary btntoedit" data-ajax="true" data-ajax-method="POST" data-ajax-mode="replace" data-ajax-update="#thereplace" id="delbtn">確定</a>
            </div>
          </div>
          <table id="table_id" class="table display">
            <thead>
             <tr>
              <th>IP位置</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach($iplists as $vals){
              echo '<tr><td>'.$vals.'</td></tr>';
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
  $("#btntodeletetime").click(function(){
    $.post("setting/changedeletetime.php",{val:$("#DeleteTime").val()},function(data){
      if(data == "success"){
        alert("更新成功");
      }else if(data == "fail"){
        alert("更新失敗");
      }else{
        alert("不知原因之更新失敗");
      }
    });
  });
  $("#btntoemailsent").click(function(){
    $.post("setting/changeemailsent.php",{val:$("#EmailSent").val()},function(data){
      if(data == "success"){
        alert("更新成功");
      }else if(data == "fail"){
        alert("更新失敗");
      }else{
        alert("不知原因之更新失敗");
      }
    });
  });
  $("#addbtn").click(function(){
    var option = $("#addipsetting").val();
    $("#addbtn").attr("href","setting/addsetting.php?val="+option);
  });
  $("#delbtn").click(function(){
    var option = $("#delipsetting").val();
    $("#delbtn").attr("href","setting/delsetting.php?val="+option);
  });
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