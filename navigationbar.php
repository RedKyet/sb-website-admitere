<?php
//$string+='';
function makenav($status, $name){
  //session_start();
  
  echo '<div class="up">';
  echo '<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="#news">News</a>
  <a href="#contact">Contact</a>
  <a href="#about">About</a>
  <a id="login-button">';
  if($status==0){
    echo 'Login';
  }else{
    echo $name;
  }
  echo '</a></div>';

  
if($status==0){
    echo '<div id="overlay">
 
	<div class="login">
		<input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
		<input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
    
		<div class="form">
			<div class="sign-in-htm">
<form method="post" class="login-form">
<input id="user" type="text" class="button input" name="username" placeholder="Username" required/>
<input id="pass" type="password" class="button input" name="password" placeholder="Password" required/>
<input type="submit" class="button" id="submit" name="lsubmit" value="Login"/>
 
    </form>
			</div>

			<div class="sign-up-htm">
<form method="post" class="register-form">
<input id="user" type="text" class="button input" name="username" placeholder="Username" required/>
<input id="pass" type="password" class="button input" name="password" placeholder="Password" required/>
<input type="submit" class="button" id="submit" name="rsubmit" value="Sign Up"/>
    </form>
  
			</div>  
		</div>
	</div>
</div>';
  }else{
  echo '<div id="overlay">
 
	
			
<form method="post" class="logout-form">

<input type="submit" class="button" id="submit" name="osubmit" value="Log out"/>
    </form>
    
		
</div>';
  }



echo '</div>';

}
?>
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
    $_SESSION["status"] = 1;
    echo ' <meta http-equiv="refresh" content="0;url=index.php">';
  }else{
    echo "user doesnt exist";
  }
}   
  
  //echo $message;
?>
<?php


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

?>
  <?php
if(isset($_POST['osubmit'])){


  
 
    $_SESSION["username"] = '';
    $_SESSION["password"] = '';
    $_SESSION["status"] = 0;
    echo ' <meta http-equiv="refresh" content="0;url=index.php">';

}   
  

?>

