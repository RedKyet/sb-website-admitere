<?php
$username=$_GET["username"];
$friends=[[]];
$ppl=[];
$path = 'userdata/friends/'.$username.'.txt';


if(file_exists($path)){
  if ( 0 != filesize($path))
{
    $friends=json_decode(file_get_contents($path));
for($i=0; $i<sizeof($friends); $i++){
  $ppl[$i]=$friends[$i][0];
}
  
}
}

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
    $name=pathinfo($file, PATHINFO_FILENAME);
    
    if(!in_array($name, $ppl)){
      $people[$count]=pathinfo($file, PATHINFO_FILENAME);
    }
	
	}
	
}
echo json_encode($people);
?>