<?php
$sender=$_GET["sender"];
$receiver=$_GET["receiver"];

?>
<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
#formcontainer{
  position:fixed;
  width: 100%;
  overflow: hidden;
  bottom:10px;
  height:40px;
  background-color:white;
}
#inputbox{
  border: 2px solid gray;
  width:75%;
  height: 30px;
}
#messagesender{
  width:20%;
  border:none;
  background-color: green;
  color: white;
  height: 35px;
  padding: 0px 0px 0px 0px;
}
</style>
<style>
.sender{
  max-width: 60%;
  min-width:40%;
  background-color:green;
  color:white;
  position:relative;
  margin-top:5px;
  margin-bottom:5px;
  text-align:center;
  border: 2px solid green;
  border-radius: 10%;
}
.receiver{
  max-width: 60%;
  min-width:40%;
  position: relative;
  text-align: center;
  margin-top: 5px;
  margin-right:0px;
  margin-left:40%;
  background-color:lightgray;
  color:black;
  border: 2px solid lightgray;
  border-radius: 10%;
}
.info{
  font-size:12px;
  border: 2px dotted gray;
}
#messageboxes{
  position:relative;
  overflow:scroll;
  top:0;
  width:100%;
  height: 90%;
}
</style>
</head>
<body>
<div id="messageboxes">
</div>
<div id="formcontainer">
<input name="message" value="" placeholder="Mesaj Gir" id="inputbox" />
<button id="messagesender" type="submit">Gönder</button>
<input name="last_id" value="" id="last_id" style="display:none;"/>
<audio id="notification">
  <source src="./sound/notification.mp3" type="audio/mpeg">
</audio>


<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script>
  //$("messagebox").preventDefault();
  function appendData(data,sender,receiver){
    for(var i = 0; i <= data.length; i++){
      if(sender == data[i].sender){
      var html = '<div class="sender t">'+data[i].message+'<div class="info">'+data[i].sender+'</div></div>';
    }else{
      var html = '<div class="receiver t">'+data[i].message+'<div class="info">'+data[i].sender+'</div></div>';
    }
      $("#messageboxes").append(html);
      window.scrollTo(0,document.body.scrollHeight);
      if(i==data.length-1){
        $("#last_id").val(data[i].id);
        break;
      }
    }

  }
  function addMyMessage(sender,receiver,message){
      //$("#inputbox").val("");
      if(message == ""){
        confirm("Mesaj Girmediniz!");
      }else{
        addMessage(sender,receiver,message);
        var html = '<div class="sender">'+message+'<div class="info">'+sender+'</div></div>';
        $("#messageboxes").append(html);
    }
  }
  function getMessages(sender, receiver){
    $.ajax({
        method:"GET",
        url:"http://localhost/api/index.php",
        data:{sender:sender,receiver:receiver},
        success:function(data){
          appendData(data,sender,receiver);
          //$("#messageboxes").scrollBottom += $("#messageboxes").scrollHeight;
          return true;
        },
        error:function(error,code){
          return false;
        }
    });
  }
  function addMessage(sender,receiver,message){
      $.ajax({
        method:"GET",
        url:"http://localhost/api/add.php",
        data:{sender:sender,receiver:receiver,message:message},
        success:function(data){
        },
        error:function(error,code){
          return 0;
        }
      });
  }
  </script>


  <script>
      function getNewMessages(sender,receiver){
        var lastId = $("#last_id").val();
        //alert(last_id);
        $.ajax({
            method:"GET",
            url:"http://localhost/api/check.php",
            data:{sender:sender,receiver:receiver,lastId:lastId},
            success:function(data){
            
            if(data.length != 0){
                appendData(data,sender,receiver);
                $('#notification')[0].play();
            }
            },
            error:function(error,code){
              return 0;
            }
        });
      }
  </script>
  <script>
  var bool = false;
  window.onload = function(){
    bool = getMessages(<?php echo "'".$sender."'"; ?>,<?php echo "'".$receiver."'"; ?>);
    $("#messageboxes").animate({ scrollBottom: 20000000 }, "slow");

  }
  setTimeout(function(){
    setInterval(function(){
      getNewMessages('<?php echo $sender; ?>','<?php echo $receiver; ?>');
    },1000);
},3000);
    $("#messagesender").on("click",function(){
      var message = $("#inputbox").val();
      addMyMessage(<?php echo "'".$sender."', '".$receiver."'"; ?>,message);
    });
  </script>
</body>
</html>