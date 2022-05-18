<?php

$people=[];

$path = 'userdata/online';
$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));
foreach($files as $file){
	if($file!='.txt'){
	$count=sizeof($people);
	$f = fopen($path.'/'.$file, 'r');
	$line = fgets($f);
	fclose($f);
	//$people[$count][0]=$line;
	$people[$count]=pathinfo($file, PATHINFO_FILENAME);
	}
	
}
echo json_encode($people);
?>