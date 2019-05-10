<?php
session_start();
$addsingle = "";
$_SESSION['status'] = "add";
if(isset($_GET["val"])){
  if($_GET["val"] === "single"){
    $addsingle = 1;
  }else{
    $addsingle = 0;
  }
}
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
  <form id="myForm" class="form-horizontal"  method="post" action="../Admin/Setting.php">
    <div class="form-group row">
      <div class="col-xs-12 col-md-12">
        <input id="ip1" maxlength="3" name="ip1" placeholder="ip數組[1]" style="width:10%;margin-left:2px;" type="text" value="">
        <input id="ip2" maxlength="3" name="ip2" placeholder="ip數組[2]" style="width:10%;margin-left:2px;" type="text" value="">
        <input id="ip3" maxlength="3" name="ip3" placeholder="ip數組[3]" style="width:10%;margin-left:2px;" type="text" value="">
        <input id="ip4" maxlength="3" name="ip4" placeholder="ip數組[4]" style="width:10%;margin-left:2px;" type="text" value="">
      </div>

      <?php 
      if(!$addsingle)
      {
        echo '<div class="col-xs-12 col-md-12"><label>到</label></div>
        <div class="col-xs-12 col-md-12">
        <input id="ip1s" maxlength="3" name="ip1s" placeholder="ip2數組[1]" readonly style="width:10%;margin-left:2px;" type="text" value="">
        <input id="ip2s" maxlength="3" name="ip2s" placeholder="ip2數組[2]" readonly style="width:10%;margin-left:2px;" type="text" value="">
        <input id="ip3s" maxlength="3" name="ip3s" placeholder="ip2數組[3]" readonly style="width:10%;margin-left:2px;" type="text" value="">
        <input id="ip4s" maxlength="3" name="ip4s" placeholder="ip2數組[4]" style="width:10%;margin-left:2px;" type="text" value="">
        </div>';
      }
      ?>
      <input type="hidden" name="refer" value="<?php echo $addsingle;?>">
      <div class="col-xs-12 col-md-12">
        <button style="margin-top: 10px;" id="addip" type="submit">新增</button>
      </div>
    </div>
  </form>
</body>
</html>
<script>
  var single = <?php echo $addsingle;?>;
  $("#ip1").on("input",function(){
    $("#ip1s").val($(this).val()) ; 
  });
  $("#ip2").on("input",function(){
    $("#ip2s").val($(this).val()) ; 
  });
  $("#ip3").on("input",function(){
    $("#ip3s").val($(this).val()) ; 
  });
  $('input').keyup(function (e) {
    if ($(this).val().length == $(this).attr('maxlength'))
      $(this).next(':input').focus();
  });
  $("#addip").click(function(){
    if(addsingle){
      if ($('#ip1').val()>255 || $('#ip2').val()>255 || $('#ip3').val()>255 || $('#ip4').val()> 255){
        alert("ip請勿超過255");
        return false;
      }
      if($('#ip1').val().length == 0 || $('#ip1').val().length == 0 || $('#ip1').val().length == 0 || $('#ip1').val().length == 0){
        alert("請輸入ip");
        return false;
      }
    }else{
      if ($('#ip1').val()>255 || $('#ip2').val()>255 || $('#ip3').val()>255 || $('#ip4').val()>255 || $('#ip1s').val()>255 || $('#ip2s').val()>255 || $('#ip3s').val()>255 || $('#ip4s').val()>255){
        alert("ip請勿超過255");
        return false;
      }
      if($('#ip1').val().length == 0 || $('#ip2').val().length == 0 || $('#ip3').val().length == 0 || $('#ip4').val().length == 0 || $('#ip1s').val().length == 0 || $('#ip2s').val().length == 0 || $('#ip3s').val().length == 0 || $('#ip4s').val().length == 0){
        alert("請輸入ip");
        return false;
      }
      if(Number($('#ip1s').val()) >= Number($('#ip1').val())){
        if(Number($('#ip1s').val()) == Number($('#ip1').val())){
          if(Number($('#ip2s').val()) >= Number($('#ip2').val())){
            if(Number($('#ip2s').val()) == Number($('#ip2').val())){
              if(Number($('#ip3s').val()) >= Number($('#ip3').val())){
                if(Number($('#ip3s').val()) == Number($('#ip3').val())){
                  if(Number($('#ip4s').val()) >= Number($('#ip4').val())){
                    if(Number($('#ip4s').val()) == Number($('#ip4').val())){
                      return true;
                    }
                    if(Number($('#ip4s').val()) > Number($('#ip4').val())){
                      return true;
                    }
                    if(Number($('#ip4s').val()) < Number($('#ip4').val())){
                      return false;
                    }
                  }else{
                    alert("輸入無效IP");
                    return false;
                  }
                }
                if(Number($('#ip3s').val()) > Number($('#ip3').val())){
                  return true;
                }
              }else{
                alert("輸入無效IP");
                return false;
              }
            }
            if(Number($('#ip2s').val()) > Number($('#ip2').val())){
              return true;
            }
          }else{
            alert("輸入無效IP");
            return false;
          }
        }
        if(Number($('#ip1s').val()) > Number($('#ip1').val())){
          return true;
        }
      }else{
        alert("輸入無效IP");
        return false;
      }
    }
  });
</script>

