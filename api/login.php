<?php include_once "db.php";

$chk=$pdo->query("SELECT count(*) FROM `users` WHERE `username`='{$_POST['username']}' && `password`='{$_POST['password']}'")->fetchColumn();

if($chk){
    $_SESSION['login']=1;
    $_SESSION['name']=$_POST['username'];
    $_SESSION['user_id']=$pdo->query("SELECT `id` FROM `users` WHERE `username`='{$_POST['username']}' && `password`='{$_POST['password']}'")->fetchColumn();
    echo $chk;
}else{
    echo 0;
}