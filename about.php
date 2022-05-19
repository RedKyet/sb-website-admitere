<?php
// Start the session
session_start();
if($_SESSION["status"]!=1){
  $_SESSION["status"] = 0;
}
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
  
<?php makenav($_SESSION["status"],$_SESSION["username"]); ?>
<?php makechat($_SESSION["status"],0); ?>
<h1 class="text">About</h1>
<div class="glass">

<p>copyright lattek 2022</p>

  
</div


  </body>
</html>
