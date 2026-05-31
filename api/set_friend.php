<?php include_once "db.php";
header("Content-Type: application/json,charset:utf8");
$my=$_SESSION['user_id'];
$friend=$_GET['friend_id'];

//是否有此好友
$chk_friend=$pdo->query("select count(*) from `users` where `id`='$friend'")->fetchColumn();
if($chk_friend){
$relation=$pdo->query("select * from `friends` where 
                            (`requester_id`='$my' AND `addressee_id`='$friend') OR 
                            (`requester_id`='$friend}' AND `addressee_id`='$my')")->fetch();

$action=$_GET['action'];



switch($action){
    case "apply":
        $pdo->exec("insert into `friends` (`requester_id`,`addressee_id`,`status`) 
                                      values('$my','$friend','pendding')");
        echo json_encode(['success'=>true,'message'=>'好友申請已送出'],JSON_UNESCAPED_UNICODE);
    break;
    case 'accept':
        $pdo->exec("update `friends` set `status`='accept' where `id`='{$relation['id']}'");

        echo json_encode(['success'=>true,'message'=>'好友申請已接受'],JSON_UNESCAPED_UNICODE);        
    break;
    case 'cancel':
        $pdo->exec("delete from `friends` where `id`='{$relation['id']}'");

        echo json_encode(['success'=>true,'message'=>'好友申請已取消'],JSON_UNESCAPED_UNICODE);        
    break;
    case 'reject':
        $pdo->exec("delete from `friends` where `id`='{$relation['id']}'");

        echo json_encode(['success'=>true,'message'=>'好友申請拒絕'],JSON_UNESCAPED_UNICODE);  
    break;
    case 'remove':
        $pdo->exec("delete from `friends` where `id`='{$relation['id']}'");

        echo json_encode(['success'=>true,'message'=>'好友已移除'],JSON_UNESCAPED_UNICODE);  
    break;
    default:

        echo json_encode(['success'=>false,'message'=>'操作失敗'],JSON_UNESCAPED_UNICODE);  
}
}else{

        echo json_encode(['success'=>false,'message'=>'查無此使用者'],JSON_UNESCAPED_UNICODE);  
}

