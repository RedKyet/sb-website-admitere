<?php
// Start the session
session_start();

require('navigationbar.php');
require('chatsidebar.php');
?>
<html>
  <head>
    <title>PHP Test</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="harta.css" rel="stylesheet" type="text/css" />
    <link href="nav.css" rel="stylesheet" type="text/css" />
    <link href="chat.css" rel="stylesheet" type="text/css" />
    <link href="contacts.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
  
<?php makenav($_SESSION["status"],$_SESSION["username"]); ?>
<?php makechat($_SESSION["status"],0); ?>

<h1 class="text">Data</h1>


<div id="contacts" >
  <p>Change username</p>

<form method="post" class="logout-form">
  <input type="text" class="button" id="username2" name="username2" value="<?php echo $_SESSION["username"]; ?>"/>
<input type="submit" class="button" id="submit" name="change" value="Change"/>
    </form>
</div>
  
  
<?php

if($_SESSION['username']==null){
  echo ' <meta http-equiv="refresh" content="0 url=index.php">';
}
if(isset($_POST['change'])){
  $username = $_SESSION['username'];
  $username2 = $_POST['username2'];
  if(file_exists("userdata/friends/".$username.".txt")){
    rename("userdata/friends/".$username.".txt", "userdata/friends/".$username2.".txt");
  }
    //change friends
  $people=[[]];

$path = 'userdata/friends/';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));
foreach($files as $file){
	if($file!='.txt'){
	
    $people=json_decode(file_get_contents($path.'/'.$file));
    //echo file_get_contents($path.'/'.$file);
    $count=sizeof($people);
	for($i = 0; $i < $count; $i++){
    if($people[$i][0]==$username){ 
      $people[$i][0]=$username2;
    }
  }
    file_put_contents($path.'/'.$file, json_encode($people));
	
	
	}
	
}
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
  
  for($i = 0; $i < $count; $i++){
    if($users[$i][0]==$username){
      
      $users[$i][0]=$username2;
      $_SESSION['username']=$username2;
      file_put_contents($path.'users.txt', json_encode($users));
      echo ' <meta http-equiv="refresh" content="0">';
      break;
    }
  }
  
}   
  
  //echo $message;
?>


  </body>
</html>
<!--<p>Lazar Dragos</p>
<div id="contacts">
  <a href="#"><span>Facebook</span></a>
  <a href="#"><span>Twitter</span></a>
  <a href="#"><span>Google+</span></a>
  <a href="#"><span>Github</span></a>
  <a href="#"><span>Dribbble</span></a>
  <a href="#"><span>CodePen</span></a>
</div>
<p>Teodor Moscaliuc</p>
<div id="contacts">
  <a href="#"><span>Facebook</span></a>
  <a href="#"><span>Twitter</span></a>
  <a href="#"><span>Google+</span></a>
  <a href="#"><span>Github</span></a>
  <a href="#"><span>Dribbble</span></a>
  <a href="#"><span>CodePen</span></a>
</div>
-->