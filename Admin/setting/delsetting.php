<?php
session_start();
$_SESSION['status'] = "del";
$delsingle = "";
if(isset($_GET["val"])){
  if($_GET["val"] === "single"){
    $delsingle = 1;
  }else{
    $delsingle = 0;
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
        <input id="dip1" maxlength="3" name="dip1" placeholder="ip數組[1]" style="width:10%;margin-left:2px;" type="text" value="">
        <input id="dip2" maxlength="3" name="dip2" placeholder="ip數組[2]" style="width:10%;margin-left:2px;" type="text" value="">
        <input id="dip3" maxlength="3" name="dip3" placeholder="ip數組[3]" style="width:10%;margin-left:2px;" type="text" value="">
        <input id="dip4" maxlength="3" name="dip4" placeholder="ip數組[4]" style="width:10%;margin-left:2px;" type="text" value="">
      </div>

      <?php 
      if(!$delsingle)
      {
        echo '<div class="col-xs-12 col-md-12"><label>到</label></div>
        <div class="col-xs-12 col-md-12">
        <input id="dip1s" maxlength="3" name="dip1s" placeholder="ip2數組[1]" readonly style="width:10%;margin-left:2px;" type="text" value="">
        <input id="dip2s" maxlength="3" name="dip2s" placeholder="ip2數組[2]" readonly style="width:10%;margin-left:2px;" type="text" value="">
        <input id="dip3s" maxlength="3" name="dip3s" placeholder="ip2數組[3]" readonly style="width:10%;margin-left:2px;" type="text" value="">
        <input id="dip4s" maxlength="3" name="dip4s" placeholder="ip2數組[4]" style="width:10%;margin-left:2px;" type="text" value="">
        </div>';
      }
      ?>
      <input type="hidden" name="del" value="<?php echo $delsingle;?>">
      <div class="col-xs-12 col-md-12">
        <button style="margin-top: 10px;" id="delip" type="submit">刪除</button>
      </div>
    </div>
  </form>
</body>
</html>
<script>
  var single = <?php echo $delsingle;?>;
  $("#dip1").on("input",function(){
    $("#dip1s").val($(this).val()) ; 
  });
  $("#dip2").on("input",function(){
    $("#dip2s").val($(this).val()) ; 
  });
  $("#dip3").on("input",function(){
    $("#dip3s").val($(this).val()) ; 
  });
  $('input').keyup(function (e) {
    if ($(this).val().length == $(this).attr('maxlength'))
      $(this).next(':input').focus();
  });
  $("#delip").click(function(){
    if(single){
      
      if ($('#dip1').val()>255 || $('#dip2').val()>255 || $('#dip3').val()>255 || $('#dip4').val()> 255){
        alert("ip請勿超過255");
        return false;
      }
      if($('#dip1').val().length == 0 || $('#ip1').val().length == 0 || $('#dip1').val().length == 0 || $('#dip1').val().length == 0){
        alert("請輸入ip");
        return false;
      }
    }else{
      
      if ($('#dip1').val()>255 || $('#dip2').val()>255 || $('#dip3').val()>255 || $('#dip4').val()>255 || $('#dip1s').val()>255 || $('#dip2s').val()>255 || $('#dip3s').val()>255 || $('#dip4s').val()>255){
        alert("ip請勿超過255");
        return false;
      }
      if($('#dip1').val().length == 0 || $('#dip2').val().length == 0 || $('#dip3').val().length == 0 || $('#dip4').val().length == 0 || $('#dip1s').val().length == 0 || $('#dip2s').val().length == 0 || $('#dip3s').val().length == 0 || $('#ip4s').val().length == 0){
        alert("請輸入ip");
        return false;
      }
      if(Number($('#dip1s').val()) >= Number($('#dip1').val())){
        if(Number($('#dip1s').val()) == Number($('#dip1').val())){
          if(Number($('#dip2s').val()) >= Number($('#dip2').val())){
            if(Number($('#dip2s').val()) == Number($('#dip2').val())){
              if(Number($('#dip3s').val()) >= Number($('#dip3').val())){
                if(Number($('#dip3s').val()) == Number($('#dip3').val())){
                  if(Number($('#dip4s').val()) >= Number($('#dip4').val())){
                    if(Number($('#dip4s').val()) == Number($('#dip4').val())){
                      return true;
                    }
                    if(Number($('#dip4s').val()) > Number($('#dip4').val())){
                      return true;
                    }
                    if(Number($('#dip4s').val()) < Number($('#dip4').val())){
                      return false;
                    }
                  }else{
                    alert("輸入無效IP");
                    return false;
                  }
                }
                if(Number($('#dip3s').val()) > Number($('#dip3').val())){
                  return true;
                }
              }else{
                alert("輸入無效IP");
                return false;
              }
            }
            if(Number($('#dip2s').val()) > Number($('#dip2').val())){
              return true;
            }
          }else{
            alert("輸入無效IP");
            return false;
          }
        }
        if(Number($('#dip1s').val()) > Number($('#dip1').val())){
          return true;
        }
      }else{
        alert("輸入無效IP");
        return false;
      }
    }
  });
</script>

