<?php include "db.php";
$img=$_POST['imgString'];
$user=$_SESSION['login'];

$source=explode(",",$img);
$imgData=base64_decode($source[1]);

if(strpos($source[0],'jpeg')!==false){
    $ext=".jpg";
}else if(strpos($source[0],'png')!==false){
    $ext=".png";
}else if(strpos($source[0],'gif')!==false){
    $ext=".gif";
}else{
    $ext=".jpg";
}

$filename=$user."_".date("ymdhis").$ext; 
$sourceImg=$pdo->query("SELECT `header` FROM `users` WHERE `username`='$user'")->fetchColumn();
if(strlen($sourceImg)>0){
    unlink("../img/".$sourceImg);
}
if(file_put_contents('../img/'.$filename,$imgData)){
    echo 1;
    $user=$pdo->query("UPDATE `users` SET `header`='$filename' WHERE `username`='$user';");

}else{
    echo 0;
}




