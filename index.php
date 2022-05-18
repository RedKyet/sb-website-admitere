<?php
// Start the session
session_start();
?>
<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <a href="index.php">login</a>
    <a href="register.php">register</a>
    <?php echo '<p>Hello Login</p>'; ?> 
    
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

    
  </body>
</html>