<?php include_once "../api/db.php";
$my=$pdo->query("SELECT * FROM `users` WHERE `username`='{$_SESSION['login']}'")->fetch();
?>
<div id="friends-page">
    <!--尋找好友區-->
    <div class="friend-search-section border rounded p-3 ">
        <form action="" class="friend-search-form form-group d-flex align-items-center">
            <label for="" class='mx-2'>搜尋使用者</label>
            <input type="text" name='search' id='search' class="search-input form-control col-md-7">
            <button type='button' class="search-submit-button btn btn-primary mx-2">尋找</button>
        </form>
        <div class="search-result-list my-2">
             <div class="text-center">搜尋好友結果區</div>
        </div>
    </div>

    <script>
        $(".search-submit-button").on("click",function(){
            let search=$("#search").val();
            //console.log(search)
            $.get("./api/search_users.php",{search},function(friends){
                //console.log(friends)
                $(".search-result-list").html(friends)
            })
        })
    </script>
    <!--好友列表區-->
    <div class="friend-list-section w-100 border rounded p-3 my-2">
        <h3 class="section-title text-center">好友列表</h3>
        <div class="d-flex flex-wrap p-3">
            <?php
                $friends=$pdo->query("SELECT * FROM `friends` WHERE (`requester_id`='{$my['id']}' OR `addressee_id`='{$my['id']}') AND `status`='accepted'")->fetchAll();
                foreach($friends as $friend):
                    $friend_id=($friend['requester_id']==$my['id'])?$friend['addressee_id']:$friend['requester_id'];
                    $friend_info=$pdo->query("SELECT * FROM `users` WHERE `id`='{$friend_id}'")->fetch();
            ;?>
            <div class="friend-item col-md-3 p-2 text-center" onclick="loadpage('./front/friend-profile-page.php?id=<?= $friend_info['id'] ?>')">
                <img src="./img/<?= $friend_info['header'] ?>" style="width:64px;" class="friend-avatar">
                <div class="friend-name mx-3"><?= $friend_info['username'] ?></div>
            </div>
            <?php endforeach ;?>
        </div>
    </div>
    <!--收到的好友申請區-->
    <div class="incoming-requests-section border rounded p-3 my-2 ">
        <h3 class="section-title text-center">收到的好友申請</h3>
        <div class="d-flex flex-wrap p-3">
            <?php 
            $received=$pdo->query("SELECT * FROM `friends` WHERE `addressee_id`='{$my['id']}' AND `status`='pending'")->fetchAll();
            foreach($received as $req):
                $requester=$pdo->query("SELECT * FROM `users` WHERE `id`='{$req['requester_id']}'")->fetch();
            ;?>
            <div class="request-item col-md-3 p-2 text-center">
                <img src="./img/<?= $requester['header'] ?>" style="width:64px;" class="request-avatar">
                <div class="request-username"><?= $requester['username'] ?></div>
                <div>
                    <button class="accept-request-button btn btn-success btn-sm" onclick="setFriend('accept',<?= $requester['id'] ?>)">接受好友</button>
                    <button class="reject-request-button btn btn-warning btn-sm" onclick="setFriend('reject',<?= $requester['id'] ?>)">拒絕好友</button>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <!--發送的好友申請區-->
    <div class="sent-requests-section border rounded p-3 my-2">
        <h3 class="section-title text-center">發送的好友申請</h3>
        <div class="d-flex flex-wrap p-3">
            <?php 
            $request=$pdo->query("SELECT * FROM `friends` WHERE `requester_id`='{$my['id']}' AND `status`='pending'")->fetchAll();
            foreach($request as $req):
                $addressee=$pdo->query("SELECT * FROM `users` WHERE `id`='{$req['addressee_id']}'")->fetch();
            ;?>
            <div class="request-item col-md-3 p-2 text-center">
                <img src="./img/<?= $addressee['header'] ?>" style="width:64px" class="request-avatar">
                <div class="request-username"><?= $addressee['username'] ?></div>
                <button class="cancel-request-button btn btn-warning btn-sm" onclick="setFriend('cancel',<?= $addressee['id'] ?>)">取消申請</button>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    
</div>
<script>
function setFriend(action,friend_id){
    $.get("./api/set_friend.php",{action,friend_id},function(res){
        //console.log(res);
        if(res.success){
            alert(res.message);
            loadpage(`./front/friends-page.php?id=${friend_id}`);
        }else{
            alert("操作失敗");
        }
    })
}
</script>