<?php include_once "db.php";
header("Content-Type:application/json,charset=utf8");

$chk=$pdo->query("SELECT count(*) FROM `users` WHERE `username`='{$_POST['username']}' && `password`='{$_POST['password']}'")->fetchColumn();

if($chk){
    $_SESSION['login']=1;
    $_SESSION['name']=$_POST['username'];
    $_SESSION['user_id']=$pdo->query("SELECT `id` FROM `users` WHERE `username`='{$_POST['username']}' && `password`='{$_POST['password']}'")->fetchColumn();
    echo json_encode(['result'=>'success','message'=>'OK'],JSON_UNESCAPED_UNICODE);
}else{
    echo json_encode(['result'=>'fail','message'=>'帳號或密碼錯誤,請重新登入'],JSON_UNESCAPED_UNICODE);
}