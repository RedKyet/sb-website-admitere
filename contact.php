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

  
<h1 class="text">Contact</h1>

<div id="contacts" >
  <p>Lazăr Dragoș George</p>
  <a href="https://www.independent.co.uk/tech/facebook-privacy-leak-mark-zuckerberg-documents-friends-a8872111.html"><span>Facebook</span></a>
  <a href="https://twitter.com/monsieurlazar"><span>Twitter</span></a>
  <a href="https://www.instagram.com/monsieurproductions/"><span>Instagram</span></a>
  <a href="https://github.com/MonsieurLazar"><span>Github</span></a>
  <a href="https://www.youtube.com/channel/UCQR8OSRpq7mcC__QrfN961A"><span>Youtube</span></a>
  <a href="https://www.youtube.com/watch?v=q3WC-X7xDNo&ab_channel=DayofMemes"><span>Snapchat</span></a>
</div>
<div id="contacts" >
  <p>Moscaliuc Teodor</p>
  <a href="https://www.independent.co.uk/tech/facebook-privacy-leak-mark-zuckerberg-documents-friends-a8872111.html"><span>Facebook</span></a>
  <a href="https://github.com/MonsieurLazar"><span>Twitter</span></a>
  <a href="https://www.instagram.com/o_mata_rosie/"><span>Instagram</span></a>
  <a href="https://github.com/RedKyet"><span>Github</span></a>
  <a href="https://www.youtube.com/channel/UClQCXV8uoOvN32HaqLDCIoA"><span>Youtube</span></a>
  <a href="https://www.youtube.com/watch?v=q3WC-X7xDNo&ab_channel=DayofMemes"><span>Snapchat</span></a>
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