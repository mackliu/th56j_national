<?php
include_once "../api/db.php";
$game=$pdo->query("select * from `games` where `id`='{$_GET['id']}'")->fetch();
$game_setting=json_decode(file_get_contents("../games/{$game['id']}/game.json"));
              
?>
<div id="game-play">
    <h2 class="current-game-title text-center"><?=$game['title'];?></h2>
    <section class="game-area">
        <iframe src="<?=$game_setting->entry->url;?>" frameborder="0" class="game-frame d-block m-auto w-75 " style="height:600px;" >

        </iframe>
    </section>
    <aside class="game-leaderboard">
        <h2 class="leaderboard-title text-center"><?=$game['title'];?>風雲排行榜</h2>
        <div id="leaderboard" class="list-group w-50 mx-auto">

        </div>
    </aside>
</div>

<script>
    // 拉排行榜並重繪（寫入新分數後也會再呼叫一次刷新）
    function loadLeaderboard(){
        $.get("<?= $game_setting->score->pullUrl ?>",(ranks)=>{
            $("#leaderboard").empty();
            if(ranks.length>0){
                let cols=`<div class="leaderboard-item list-group-item d-flex text-center">
                                <div class="player-rank col-2">排名</div>
                                <div class="player-name col-6"><?= $game_setting->score->columns[0]; ?></div>
                                <div class="player-score col-2"><?= $game_setting->score->columns[1];?></div>
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
        },"json")
    }

    // 接收 iframe 內遊戲透過 postMessage 傳回的成績
    // 因為本頁是用 $.load 反覆載入，先移除舊的 listener 再掛上，避免重複觸發
    if(window.__onGameResult){
        window.removeEventListener("message", window.__onGameResult);
    }
    window.__onGameResult = function(e){
        const d = e.data;
        if(!d || d.type !== "GAME_RESULT") return;
        if(d.result !== "完成") return;            // 失敗不記錄
        $.post("<?= $game_setting->score->pushUrl ?>",
            { score: d.score, display: d.display },
            (res)=>{
                if(res && res.error){
                    console.warn("分數寫入失敗：", res.error);
                    return;
                }
                loadLeaderboard();                  // 寫入成功後刷新排行榜
            },"json");
    };
    window.addEventListener("message", window.__onGameResult);

    loadLeaderboard();
</script>