<?php
// Start the session
session_start();
//echo $_SESSION["mes"];
//if($_SESSION["status"]==0){
//  $_SESSION["mes"]=0;
//}
?>
<?php

$username = $_SESSION["username"];
$password = $_SESSION["password"];
$id = $_SESSION["id"];
$talk = $_POST["button"];
$fr = $_POST["fr"];
$_SESSION["action"]=$_POST["action"];
$action = $_SESSION["action"];
//echo $action;
switch ($action) {
    case 'sms':
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

$_SESSION["conv"]=$conv;
//make file
$path = 'userdata/convs';
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
  
  
    case 'add':

$path = 'userdata/friends/';
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
  $friends = [[]];
  if(!file_exists($path.$username.'.txt')) {
    file_put_contents($path.$username.'.txt', '');
    $count=0;
  }else{
    $friends = json_decode(file_get_contents($path.$username.'.txt'));
    $count = sizeof($friends);
  }
  $friends[$count][0]=$fr;
  $friends[$count][1]=time();
  if($friends[$count][0]!=null){
    file_put_contents($path.$username.'.txt', json_encode($friends));
  }
  
 


    case 2:
        
}

?>

<?php

function makechat($status,$do){
  if($_SESSION["mes"]==0){
    
    return 0;
  }
  if($status==0){
    return 0;
  }
  echo '<div id="sidebar">';
  echo '<p>Talk with an expert</p>';

//echo "------";
 echo "<p>Your conv with ".$_SESSION["talk"]."</p>"; 

print <<< END

<div id="demo" class="demo"></div>
END;



print <<< END
<form method="post" class="login-form">
<input type="text" class="button" id="sms" name="sms" placeholder="SMS" required/>
<input type="submit" class="button" id="submit" name="submit" value="send"/>
</form>
END;
//echo "------";
  echo '<p>Hello User!</p>
<p>Online Users</p>
<p id="users"></p>
<p>Friends</p>
<p id="fr"></p>';
echo '</div>';






  
  echo '<script>
setInterval(update,1000);
var username="'.$_SESSION['username'].'";
var conv="'.$_SESSION['conv'].'";
function update(){

fetch("online.php?username="+username)
.then(response => response.json())
.then(data => { 
    //console.log(data)
  });
}
</script>';

print <<< END
<script>
onlineusers();
setInterval(onlineusers,1000);
function onlineusers(){
  var user='<?php echo $username; ?>';
fetch('getonlineusers.php?username='+username)
.then(response => response.json())
.then(data => { 
    //console.log(data)
  let string = "";
    string=string+'<ul>';
    for(var i = 0; i<data.length; i++){
        if(data[i]!=username){
          string=string+'<li>';
        string=string+'<form action="" method="post" class="us1"> <input type="hidden" id="action" name="action" value="sms"><input type="hidden" id="id" name="id" value="'+data[i]+'"><input class="button" type="submit" class="overlay_btn4" name="button" value="'+data[i]+'"/></form>';
  string=string+'<form action="" method="post" class="us2"> <input type="hidden" id="action" name="action" value="add"><input type="hidden" id="fr" name="fr" value="'+data[i]+'"><input type="submit" class="button" class="overlay_btn4" name="button2" value="add"/></form>';
  string=string+'<br><br><br>';
  
        string=string+'</li>';
        }
    }
    document.getElementById("users").innerHTML = string;
  });
}
  
</script>
END;
//firends
print <<< END
<script>
fr();
setInterval(fr,1000);
function fr(){

fetch('getfriends.php?username='+username)
.then(response => response.json())
.then(data => { 
    //console.log(data)
  friends=data;
  let string = "";
    string=string+'<ul>';
    for(var i = 0; i<data.length; i++){
        
          string=string+'<li>';
        string=string+'<form action="" method="post"> <input type="hidden" id="action" name="action" value="sms"><input type="hidden" id="id" name="id" value="'+data[i][0]+'"><input class="button" type="submit" class="overlay_btn4" name="button" value="'+data[i][0]+'"/></form><br>';;
        string=string+'</li>';
        
    }
    document.getElementById("fr").innerHTML = string;
  });
}
  
</script>
END;
print <<< END

<script>
  sms();
  var x = 0;
setInterval(sms,1000);
function sms(){

fetch('getmessages.php?name='+username+'&conv='+conv)
.then(response => response.json())
.then(data => { 
    //console.log(data)
  let string = "";
    
    for(var i = 0; i<data.length; i++){
        
        string=string+'<p>'+data[i][0]+': '+data[i][1]+'</p>';
        
    }
  string=string+'<div id="box"></div>';
    document.getElementById("demo").innerHTML = string;
  //
		if(x==0){
  let scroll_to_bottom = document.getElementById("demo");
		function scrollBottom(element) {
			element.scroll({ top: element.scrollHeight})
		}

		scrollBottom(scroll_to_bottom);
  x=1;
    }
	//
  });
}
</script>

  
END;
print <<< END
    <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

  
END;

}

?>

<?php
if(isset($_POST['submit'])){
$send=$_POST['sms'];
$conv=$_SESSION["conv"];
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
<!--
<style>
#demo{
  height: 100px;
  overflow: auto;
  display: flex;
  flex-direction: column-reverse;
  }
</style>-->
<script>
  let scroll_to_bottom = document.getElementById("demo");
		scroll_to_bottom.scrollIntoView(false);
</script>


