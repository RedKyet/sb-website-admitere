<?php
// Start the session
session_start();
?>
<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>

<?php
$username = $_SESSION["username"];
$password = $_SESSION["password"];
$id = $_SESSION["id"];
$talk = $_POST["button"];

if($talk==''){
  $talk=$_SESSION["talk"];
}else{
  $_SESSION["talk"]=$talk;
}

$path = 'userdata/';
$users = json_decode(file_get_contents($path.'users.txt'));
    $count=sizeof($users);
  for($i = 0; $i < $count; $i++){
    if($users[$i][0]==$talk){
      $talkid = $i;
    }
  }
$conv=min($id,$talkid).'.'.max($id,$talkid);
//make file
$path = 'userdata/convs';
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
  
  
?>
    
<?php

echo '<p>Hello User!</p>'; 

echo "<p>talk ".$conv."</p>";
?> 


<p id="demo">Online Users</p>
    
<script>
setInterval(update,1000);
function update(){
var $username='<?php echo $username; ?>';
fetch('online.php?username='+$username)
.then(response => response.json())
.then(data => { 
    //console.log(data)
  });
}
</script>
<script>
setInterval(onlineusers,1000);
function onlineusers(){
fetch('getonlineusers.php')
.then(response => response.json())
.then(data => { 
    console.log(data)
  let string = "";
    string=string+'<ul>';
    for(var i = 0; i<data.length; i++){
        string=string+'<li>';
        string=string+'<form action="talk.php" method="post"> <input type="hidden" id="id" name="id" value="'+data[i]+'"><input type="submit" class="overlay_btn4" name="button" value="'+data[i]+'"/></form>';;
        string=string+'</li>';
    }
    document.getElementById("users").innerHTML = string;
  });
}
</script>
<script>
setInterval(update,1000);
function update(){
var $username='<?php echo $username; ?>';
fetch('online.php?username='+$username)
.then(response => response.json())
.then(data => { 
    //console.log(data)
  });
}
</script>
<script>
  sms();
setInterval(sms,1000);
function sms(){
var username = '<?php echo $username; ?>';
var conv = '<?php echo $conv; ?>';
fetch('getmessages.php?name='+username+'&conv='+conv)
.then(response => response.json())
.then(data => { 
    console.log(data)
  let string = "";
    
    for(var i = 0; i<data.length; i++){
        
        string=string+data[i][0]+': '+data[i][1]+'<br>';
        
    }
    document.getElementById("demo").innerHTML = string;
  });
}
</script>
    <form method="post" class="login-form">

<input type="text" id="sms" name="sms" placeholder="Username" required/>
<input type="submit" id="submit" name="submit" value="send"/>
 
    </form>
<?php
if(isset($_POST['submit'])){
$send=$_POST['sms'];

//echo $send;
  $path='userdata/convs/';
  $sms = [[]];
  if(!file_exists ($path.$conv.'.txt')) {
    $count = 0;
    $sms[0][0]="admin";
    $sms[0][1]="hi";
    file_put_contents($path.$conv.'.txt', json_encode($sms));
  }else{
    $sms = json_decode(file_get_contents($path.$conv.'.txt'));
    $count = count($sms);
  }
  $sms[$count][0]=$username;
  $sms[$count][1]=$send;
  //echo json_encode($sms);
file_put_contents($path.$conv.'.txt', json_encode($sms));
}

?>
  </body>
</html>