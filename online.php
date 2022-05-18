<?php
$username=$_GET["username"];
$path = 'userdata/online/';
  if (!file_exists($path)) {
    mkdir($path, 0777, true);
  }
file_put_contents($path.$username.'.txt', time());


$files = scandir($path);
$files = array_diff(scandir($path), array('.', '..'));
foreach($files as $file){
	
	$f = fopen($path.'/'.$file, 'r');
	$line = fgets($f);
	if(time()-$line>10){
	unlink($path.'/'.$file);	
	unlink($path.'/'.$file);	
}
fclose($f);
}
echo json_encode($username);
?>