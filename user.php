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
?>
    <a href="index.php">login</a> <a href="register.php">register</a>
<?php

echo '<p>Hello User!</p>'; 
$message = "Success! username: ".$username." password: ".$password;
echo $message;

?> 
<p>Online Users</p>
<p id="users">Online Users</p>
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
  var user='<?php echo $username; ?>';
fetch('getonlineusers.php')
.then(response => response.json())
.then(data => { 
    console.log(data)
  let string = "";
    string=string+'<ul>';
    for(var i = 0; i<data.length; i++){
        if(data[i]!=user){
          string=string+'<li>';
        string=string+'<form action="talk.php" method="post"> <input type="hidden" id="id" name="id" value="'+data[i]+'"><input type="submit" class="overlay_btn4" name="button" value="'+data[i]+'"/></form><br>';;
        string=string+'</li>';
        }
    }
    document.getElementById("users").innerHTML = string;
  });
}
  
</script>
  </body>
</html>