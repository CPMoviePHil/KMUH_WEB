<?php
session_start();

require_once('../connect.php');

$userid = $password = "";
$userid_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(empty(trim($_POST["userid_input"]))){
    $userid_err = "請輸入帳號";
  }
  else{
    $userid = trim($_POST["userid_input"]);
  }
  if(empty(trim($_POST["password_input"]))){
    $password_err = "請輸入密碼";
  }
  else{
    $password = trim($_POST["password_input"]);
  }

  if(empty($userid_err) && empty($password_err)){
    $query = "SELECT password FROM accounts WHERE userid = ?";

    if($stmt = mysqli_prepare($link, $query)){
      mysqli_stmt_bind_param($stmt, "s", $param_userid);
      $param_userid = $userid;
      if(mysqli_stmt_execute($stmt)){
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) == 1){
          mysqli_stmt_bind_result($stmt, $param_password);
          if(mysqli_stmt_fetch($stmt)){
            if($password === $param_password){
              session_start();
              $_SESSION['userid'] = $userid;
              header("location:../Admin/Admin.php");
            }
            else{
              $password_err = '密碼輸入錯誤';
            }
          }
        }
        else{
          $userid_err = '找不到此帳號';
        }
      }
    }
    mysqli_stmt_close($stmt);
  }
}


?>

<html lang="zh-Hant">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="../AdminCSSJS/js/jquery.min.js"></script>

  <title>後臺管理系統</title>
  <style>


  @import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300);

  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-weight: ;
    font-family: Microsoft JhengHei, sans-serif;
  }

  body {
    font-family: Microsoft JhengHei, sans-serif;
    color: white;
    font-weight: ;
  }

  body ::-webkit-input-placeholder {
    /* WebKit browsers */
    font-family: 'Source Sans Pro', sans-serif;
    color: white;
    font-weight: 300;
  }

  body :-moz-placeholder {
    /* Mozilla Firefox 4 to 18 */
    font-family: 'Source Sans Pro', sans-serif;
    color: white;
    opacity: 1;
    font-weight: 300;
  }

  body ::-moz-placeholder {
    /* Mozilla Firefox 19+ */
    font-family: 'Source Sans Pro', sans-serif;
    color: white;
    opacity: 1;
    font-weight: 300;
  }

  body :-ms-input-placeholder {
    /* Internet Explorer 10+ */
    font-family: 'Source Sans Pro', sans-serif;
    color: white;
    font-weight: 300;
  }

  .wrapper {
    background: #50a3a2;
    background: -webkit-linear-gradient(top left, #50a3a2 0%, #53e3a6 100%);
    background: linear-gradient(to bottom right, #50a3a2 0%, #53e3a6 100%);
    position: absolute;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
  }

  .wrapper.form-success .container h1 {
    -webkit-transform: translateY(85px);
    transform: translateY(85px);
  }

  .container {
    max-width: 600px;
    margin: 0 auto;
    padding: 80px 0;
    height: 400px;
    text-align: center;
  }

  .container h1 {
    font-size: 40px;
    -webkit-transition-duration: 1s;
    transition-duration: 1s;
    -webkit-transition-timing-function: ease-in-put;
    transition-timing-function: ease-in-put;
    font-weight: 200;
    font-family: Microsoft JhengHei, sans-serif;
  }

  h1 {
    margin:0;
  }

  form {
    padding: 20px 0;
    position: relative;
    z-index: 2;
  }


  .FormInput {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: 0;
    border: 1px solid rgba(255, 255, 255, 0.4);
    background-color: rgba(255, 255, 255, 0.2);
    width: 250px;
    border-radius: 20px;
    padding: 10px 15px;
    margin: 0 auto 10px auto;
    display: block;
    text-align: center;
    font-size: 18px;
    color: white;
    -webkit-transition-duration: 0.25s;
    transition-duration: 0.25s;
  }

  .form-group label{
    margin:0;
    display: block;
    padding-right: 10px;
    font-size:18px;
    white-space: nowrap;
    font-size:;
    font-weight: 300;
  }
  input[type='text']{
    font-weight: bold;
  }
  .form-group input[type='checkbox']{
    font-size:18px;
    width: 13px;
    height: 13px;
    padding: 0;
    margin:0;
    margin-right:7px;
    vertical-align: middle;
    position: relative;
    top: -2px;
    *overflow: hidden;
  }

  form .FormInput:hover {
    background-color: rgba(255, 255, 255, 0.4);
  }

  form .FormInput:focus {
    background-color: white;
    width: 300px;
    color: #53e3a6;
  }
  form span{
    color: #ad0000;
    margin: 0;
    font-weight:bold;
  }

  form button {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    outline: 0;
    background-color: white;
    border: 0;
    padding: 10px 15px;
    color: #53e3a6;
    border-radius: 3px;
    width: 250px;
    cursor: pointer;
    font-size: 18px;
    -webkit-transition-duration: 0.25s;
    transition-duration: 0.25s;
  }

  form button:hover {
    background-color: #f5f7f9;
  }

  .bg-bubbles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
  }

  .bg-bubbles li {
    position: absolute;
    list-style: none;
    display: block;
    width: 40px;
    height: 40px;
    background-color: rgba(255, 255, 255, 0.15);
    bottom: -160px;
    -webkit-animation: square 25s infinite;
    animation: square 25s infinite;
    -webkit-transition-timing-function: linear;
    transition-timing-function: linear;
  }

  .bg-bubbles li:nth-child(1) {
    left: 10%;
  }

  .bg-bubbles li:nth-child(2) {
    left: 20%;
    width: 80px;
    height: 80px;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-animation-duration: 17s;
    animation-duration: 17s;
  }

  .bg-bubbles li:nth-child(3) {
    left: 25%;
    -webkit-animation-delay: 4s;
    animation-delay: 4s;
  }

  .bg-bubbles li:nth-child(4) {
    left: 40%;
    width: 60px;
    height: 60px;
    -webkit-animation-duration: 22s;
    animation-duration: 22s;
    background-color: rgba(255, 255, 255, 0.25);
  }

  .bg-bubbles li:nth-child(5) {
    left: 70%;
  }

  .bg-bubbles li:nth-child(6) {
    left: 80%;
    width: 120px;
    height: 120px;
    -webkit-animation-delay: 3s;
    animation-delay: 3s;
    background-color: rgba(255, 255, 255, 0.2);
  }

  .bg-bubbles li:nth-child(7) {
    left: 32%;
    width: 160px;
    height: 160px;
    -webkit-animation-delay: 7s;
    animation-delay: 7s;
  }

  .bg-bubbles li:nth-child(8) {
    left: 55%;
    width: 20px;
    height: 20px;
    -webkit-animation-delay: 15s;
    animation-delay: 15s;
    -webkit-animation-duration: 40s;
    animation-duration: 40s;
  }

  .bg-bubbles li:nth-child(9) {
    left: 25%;
    width: 10px;
    height: 10px;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-animation-duration: 40s;
    animation-duration: 40s;
    background-color: rgba(255, 255, 255, 0.3);
  }

  .bg-bubbles li:nth-child(10) {
    left: 90%;
    width: 160px;
    height: 160px;
    -webkit-animation-delay: 11s;
    animation-delay: 11s;
  }

  @-webkit-keyframes square {
    0% {
      -webkit-transform: translateY(0);
      transform: translateY(0);
    }

    100% {
      -webkit-transform: translateY(-700px) rotate(600deg);
      transform: translateY(-700px) rotate(600deg);
    }
  }

  @keyframes square {
    0% {
      -webkit-transform: translateY(0);
      transform: translateY(0);
    }

    100% {
      -webkit-transform: translateY(-700px) rotate(600deg);
      transform: translateY(-700px) rotate(600deg);
    }
  }

</style>

<!-- Bootstrap Core CSS -->
<link href="../AdminCSSJS/css/bootstrap.min.css" rel="stylesheet">
<link href="../AdminCSSJS/css/bootstrap.css" rel="stylesheet">
<link href="../AdminCSSJS/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

</head>


<body>
  <div class="wrapper">
    <div class='container'>
      <h1>後臺管理系統</h1>
      <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="form-group <?php echo (!empty($userid_err)) ? 'has-error':'';?>">
          <input id='userid' name = 'userid_input' class="FormInput" type='text' placeholder="帳號" spellcheck="false" autocomplete="off" value = '<?php echo $userid?>'>
          <span><?php echo $userid_err;?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error':'';?>">
          <input id='password' name='password_input' class="FormInput" type='password' placeholder="密碼" value>
          <span><?php echo $password_err;?></span>
        </div>
        <div id="form_Checkbox" class="form-group">
          <label><input type="checkbox">是否登出其他裝置</label>
        </div>
        <div class="text-center">
          <input type="hidden" name="refer" value="<?php echo (isset($_GET['refer'])) ?$_GET['refer']:'AdminLogin.php';?>">
          <button type="submit" class="btn btn-lg round">登入</button>
        </div>
      </form>
    </div>
  </div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../AdminCSSJS/js/bootstrap.min.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
  <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>

  <script type="text/javascript">

  </script>

</body>
</html>
<?php
mysqli_close($link);
?>