    <?php include_once "../api/db.php";?>
    <!--文章列表區塊-->
        <section class="articles">
            <h3>文章列表</h3>
            <?php
            $articles=$pdo->query("SELECT * FROM `articles` Order by `created_at` DESC LIMIT 5")->fetchAll(PDO::FETCH_ASSOC);
            foreach($articles as $article):;?>
            <article class="article-item w-100 border rounded p-3 my-2">
                <div class="d-flex justify-content-between">
                    <div class="article-title text-md bolder"><?=$article['title'];?></div>
                    <time class="article-date text-sm"><?=date("Y-m-d H:i:s",strtotime($article['created_at']));?></time>
                </div>
                <div class="d-flex">
                    <div class="article-excerpt pl-4"><?= mb_substr($article['content'],0,50);?>...</div>
                    <a href="javascript:loadpage('./front/article.php?id=<?=$article['id'];?>')" class="article-readmore text-right text-sm">閱讀更多</a>
                </div>
            </article>
            <?php endforeach ;?>
    
        </section>

    <!--通知與公告區塊-->
        <aside class="notifications p-3 border rounded">
            <h3>通知/公告</h3>
            <?php for($i=0; $i<5;$i++):;?>
            <div class="notification-item d-flex border-bottom my-2 justify-content-between">
                <div class="notification-title col-md-10; text-lg">公告事項:<?=$i;?></div>
                <time datetime="" class="notification-date col-md-2 text-right text-sm"><?=date("Y-m-d H:i:s");?></time>
            </div>
            <?php endfor;?>
        </aside>