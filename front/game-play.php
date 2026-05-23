<?php
include_once "../api/db.php";
$game=$pdo->query("select * from `games` where `id`='{$_GET['id']}'")->fetch();
$game_setting=json_decode(file_get_contents("../games/{$game['id']}/game.json"));
              
?>
<div id="game-play">
    <h2 class="current-game-title text-center"><?=$game['title'];?></h2>
    <section class="game-area">
        <iframe src="<?=$game_setting->entry->url;?>" frameborder="0" class="game-frame d-block m-auto w-75 " style="height:400px;" >

        </iframe>
    </section>
    <aside class="game-leaderboard">
        <h2 class="leaderboard-title text-center"><?=$game['title'];?>風雲排行榜</h2>
        
        <div class="leaderboard-item">
            <div class="player-rank"></div>
            <div class="player-name"></div>
            <div class="player-score"></div>
        </div>
        
        <div class="leaderboard-empty text-center">目前尚無分數紀錄</div>
    </aside>
</div>

