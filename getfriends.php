<?php

$people=[[]];
$username=$_GET["username"];
$path = 'userdata/friends/'.$username.'.txt';

$people=json_decode(file_get_contents($path));
echo json_encode($people);
?>


