<?php include_once "db.php";

$chk=$pdo->query("SELECT count(*) FROM `users` WHERE `username`='{$_POST['username']}' && `password`='{$_POST['password']}'")->fetchColumn();

if($chk){
    $_SESSION['login']=$_POST['username'];
    echo $chk;
}else{
    echo 0;
}