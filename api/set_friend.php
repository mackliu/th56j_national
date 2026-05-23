<?php include_once "db.php";
header("Content-Type: application/json");
$my=$_SESSION['user_id'];
$friend=$_GET['friend_id'];

$relation=$pdo->query("select * from `friends` where 
                            (`requester_id`='$my' AND `addressee_id`='$friend') OR 
                            (`requester_id`='$friend}' AND `addressee_id`='$my')")->fetch();

$action=$_GET['action'];



switch($action){
    case "apply":
        $pdo->exec("insert into `friends` (`requester_id`,`addressee_id`,`status`) 
                                      values('$my','$friend','pendding')");
        echo json_encode(['success'=>true,'message'=>'好友申請已送出']);
    break;
    case 'accept':
        $pdo->exec("update `friends` set `status`='accept' where `id`='{$relation['id']}'");
        echo json_encode(['success'=>true,'message'=>'好友申請已接受']);        
    break;
    case 'cancel':
        $pdo->exec("delete from `friends` where `id`='{$relation['id']}'");
        echo json_encode(['success'=>true,'message'=>'好友申請已取消']);        
    break;
    case 'reject':
        $pdo->exec("delete from `friends` where `id`='{$relation['id']}'");
        echo json_encode(['success'=>true,'message'=>'好友申請拒絕']);  
    break;
    case 'remove':
        $pdo->exec("delete from `friends` where `id`='{$relation['id']}'");
        echo json_encode(['success'=>true,'message'=>'好友已移除']);  
    break;
}

