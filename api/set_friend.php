<?php 
include_once "db.php";
header("Content-Type: application/json");
$my=$pdo->query("SELECT * FROM `users` WHERE `username`='{$_SESSION['login']}'")->fetch();
$friend=$pdo->query("SELECT * FROM `users` WHERE `id`='{$_GET['friend_id']}'")->fetch();

$action=$_GET['action'];
switch($action){
    case "apply":
        $sql="INSERT INTO `friends` (`requester_id`,`addressee_id`,`status`) VALUES('{$my['id']}','{$friend['id']}','pending')";
        $pdo->exec($sql);
        echo json_encode(['success'=>true,'message'=>'好友申請已送出']);
        break;
    case "cancel":
        $sql="DELETE FROM `friends` WHERE `requester_id`='{$my['id']}' AND `addressee_id`='{$friend['id']}' AND `status`='pending'";
        $pdo->exec($sql);
        echo json_encode(['success'=>true,'message'=>'好友申請已取消']);
        break;
    case "accept":
        $sql="UPDATE `friends` SET `status`='accepted' WHERE `requester_id`='{$friend['id']}' AND `addressee_id`='{$my['id']}' AND `status`='pending'";
        $pdo->exec($sql);
        echo json_encode(['success'=>true,'message'=>'好友申請已接受']);
        break;
    case "reject":
        $sql="UPDATE `friends` SET `status`='rejected' WHERE `requester_id`='{$friend['id']}' AND `addressee_id`='{$my['id']}' AND `status`='pending'";
        $pdo->exec($sql);
        echo json_encode(['success'=>true,'message'=>'好友申請已拒絕']);
        break;
    case "remove":
        $sql="DELETE FROM `friends` WHERE (`requester_id`='{$my['id']}' AND `addressee_id`='{$friend['id']}') OR (`requester_id`='{$friend['id']}' AND `addressee_id`='{$my['id']}')";
        $pdo->exec($sql);
        echo json_encode(['success'=>true,'message'=>'好友已移除']);
        break;
    default:
        echo json_encode(['success'=>false,'message'=>'未知的操作']);
}