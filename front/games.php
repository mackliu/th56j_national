<?php include_once "../api/db.php";?>
<div id="games">

    <section class="game-list d-flex flex-wrap p-3 ">
        <?php 
        $games=$pdo->query("select * from `games` ")->fetchAll();
        foreach($games as $game):?>
        <div class="game-item my-3 col-4 border rounded py-2">
            <img src="<?=$game['cover'];?>" alt="" class="game-cover w-100 mb-2">
            <div class="game-title"><?=$game['title'];?></div>
            <div class="game-description mb-2"><?=$game['description'];?></div>
            <a href="javascript:loadpage('./front/game-play.php?id=<?=$game['id'];?>')" class="play-game-link btn btn-lg btn-success d-block m-auto">開始遊戲</a>
            
        </div>
        <?php endforeach;?>
    </section>
</div>