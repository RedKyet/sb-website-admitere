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
    <link href="contacts.css" rel="stylesheet" type="text/css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
  
<?php makenav($_SESSION["status"],$_SESSION["username"]); ?>
<?php makechat($_SESSION["status"],0); ?>




<div id="contacts" >
  <p>Lazar Dragos</p>
  <a href="#"><span>Facebook</span></a>
  <a href="#"><span>Twitter</span></a>
  <a href="#"><span>Instagram</span></a>
  <a href="#"><span>Github</span></a>
  <a href="#"><span>Youtube</span></a>
  <a href="#"><span>Snapchat</span></a>
</div>
<div id="contacts" >
  <p>mocaliuc scrie aci datele tale</p>
  <a href="#"><span>Facebook</span></a>
  <a href="#"><span>Twitter</span></a>
  <a href="#"><span>Instagram</span></a>
  <a href="#"><span>Github</span></a>
  <a href="#"><span>Youtube</span></a>
  <a href="#"><span>Snapchat</span></a>
</div>

  



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