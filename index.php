<?php
// Start the session
session_start();
?>
<html>
  <head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="nav.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    


</head>
<body>

<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a id="login-button">Login
    
  
  </a>
</div>
<div id="overlay">
      


		
	<div class="login">
    
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    
		<div class="form">
			<div class="sign-in-htm">
        
				
				

<form method="post" class="login-form">

<input id="user" type="text" class="button input" name="username" placeholder="Username" required/>
<input id="pass" type="password" class="button input" placeholder="Password" required/>
<input type="submit" class="button" id="submit" name="lsubmit" value="Login"/>
 
    </form>
        
			</div>
			<div class="sign-up-htm">
				
				

<form method="post" class="register-form">

<input id="user" type="text" class="button input" name="username" placeholder="Username" required/>
<input id="pass" type="password" class="button input" placeholder="Password" required/>
<input type="submit" class="button" id="submit" name="rsubmit" value="Sign Up"/>
 
    </form>


        
			</div>
      
		</div>
    
	</div>
    





  
    </div>



<script>
var o = 0;
document.getElementById('login-button').onclick = swap;
 

document.getElementById('login-button').addEventListener("mouseover" , function(){

swap();
  
});
  
function swap(){
  if(o==0){
    o=1;
  }else{
    o=0;
  }
}
  setInterval
function ref(){
  if(o==0){
    off();
  }else{
    on();
  }
}

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  o=0;
  document.getElementById("overlay").style.display = "none";
}
</script>
  


    
    
    <a href="index.php">login</a>
    <a href="register.php">register</a>
    
    
    

<?php
$message = "";
if(isset($_POST['lsubmit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  //make user
  $path = 'userdata/';
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
  //open file
  $users = [[]];
  if(!filesize($path.'users.txt')) {
    $count = 0;
  }else{
    $users = json_decode(file_get_contents($path.'users.txt'));
    $count = count($users);
  }
  //check user exists
  $exists = 0;
  for($i = 0; $i < $count; $i++){
    if($users[$i][0]==$username){
      $exists = 1;
      $_SESSION["id"] = $i;
    }
  }
  if($exists==1){
    //make new user
    echo "user exists";
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $password;
    echo ' <meta http-equiv="refresh" content="0;url=user.php">';
  }else{
    echo "user doesnt exist";
  }
}   
  $message = "Success! username: ".$username." password: ".$password." ".$count;
  //echo $message;
?>
<?php

$message = "";
if(isset($_POST['rsubmit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];



  
  //make user
  $path = 'userdata/';
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
  //open file
  $users = [[]];
  if(!filesize($path.'users.txt')) {
    $count = 0;
  }else{
    $users = json_decode(file_get_contents($path.'users.txt'));
    $count = count($users);
  }
  //check user exists
  $exists = 0;
  for($i = 0; $i < $count; $i++){
    if($users[$i][0]==$username){
      echo"exists";
      $exists = 1;
    }
    
  }
  
  if($exists==0){
    //make new user
    $users[$count][0] = $username;
    $users[$count][1] = $password;
  
    file_put_contents($path.'users.txt', json_encode($users));
  }
}   
  $message = "Success! username: ".$username." password: ".$password." ".$count;
  echo $message;
?>
    
  </body>
</html>

<!--
<?php //echo '<p>Hello Login</p>'; ?> 
    
    <form method="post" class="login-form">

<input type="text" id="username" name="username" placeholder="Username" required/>
<input type="password" id="password" name="password" placeholder="Password" required/>
<input type="submit" id="submit" name="submit" value="Login"/>
 
    </form>
-->