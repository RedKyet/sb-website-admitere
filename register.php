<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <a href="index.php">login</a> <a href="register.php">register</a>
    <?php echo '<p>Hello Register</p>'; ?> 
    <form method="post" class="login-form">

<input type="text" id="username" name="username" placeholder="Username" required/>
<input type="password" id="password" name="password" placeholder="Password" required/>
<input type="submit" id="submit" name="submit" value="Login"/>
 
    </form>

<?php

$message = "";
if(isset($_POST['submit'])){
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