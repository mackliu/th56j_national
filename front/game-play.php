<?php
include_once "../api/db.php";
$game=$pdo->query("select * from `games` where `id`='{$_GET['id']}'")->fetch();
//$game_setting=json_decode(file_get_contents("../games/{$game['id']}/game.json"));
              
?>
<div id="game-play">
    <h2 class="current-game-title text-center"><?=$game['title'];?></h2>
    <section class="game-area">
        <iframe src="" frameborder="0" class="game-frame d-block m-auto w-75 " style="height:600px;" >

        </iframe>
    </section>
    <aside class="game-leaderboard">
        <h2 class="leaderboard-title text-center"><?=$game['title'];?>風雲排行榜</h2>
        <div id="leaderboard" class="list-group w-50 mx-auto">

        </div>
    </aside>
</div>

<script>

    $.get("games/<?=$_GET['id'];?>/game.json",(game_setting)=>{
        console.log(game_setting.score.pullUrl)
        $("iframe").attr("src",`${game_setting.entry.url}`)
        getLeaderBoard(game_setting.score.pullUrl)
    })

function getLeaderBoard(url){
    $.get(url,(ranks)=>{
        if(ranks.length>0){
               let cols=`<div class="leaderboard-item list-group-item d-flex text-center">
                            <div class="player-rank col-2">排名</div>
                            <div class="player-name col-6">名稱</div>
                            <div class="player-score col-2">分數</div>
                        </div>`
                        $("#leaderboard").append(cols)
            ranks.forEach((item,idx)=>{
                let list=`<div class="leaderboard-item list-group-item d-flex text-center">
                            <div class="player-rank col-2">${idx+1}</div>
                            <div class="player-name col-6">${item['玩家名稱']}</div>
                            <div class="player-score col-2">${item['分數']}</div>
                        </div>`
                $("#leaderboard").append(list)
            })
        }else{
            $("#leaderboard").append("<div class='leaderboard-empty text-center'>目前尚無分數紀錄</div>")
        }
    })
}
</script>