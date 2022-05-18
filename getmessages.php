<?php
// Start the session
session_start();
?>
<?php
//open file
$conv=$_GET["conv"];
$username=$_GET["name"];
if(strpos($conv, '.') == false){
  return 0;
}
$path = 'userdata/';
$users = json_decode(file_get_contents($path.'users.txt'));
    $count=sizeof($users);
$id=-1;
  for($i = 0; $i < $count; $i++){
    //echo $i.' '.$users[$i][0].' '.$username.' '.$id.' ';
    if($users[$i][0]==$username){
      $id = $i;
    }
  }

$first = strtok($conv, '.');

$last = substr($conv, strpos($conv, ".") + 1);    
if($id==$first or $id==$last){
  
}else{
  return 0;
}
if($username==$_SESSION["username"]){
  $path='userdata/convs/';
  $sms = [[]];
  if(!file_exists ($path.$conv.'.txt')) {
    $count = 0;
    $sms[0][0]="admin";
    $sms[0][1]="hi";
    file_put_contents($path.$conv.'.txt', json_encode($sms));
  }else{
    $sms = json_decode(file_get_contents($path.$conv.'.txt'));
    $count = count($sms);
  }
echo json_encode($sms);
}
?>