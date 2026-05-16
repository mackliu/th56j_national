    <?php include_once "../api/db.php";?>
    <!--文章列表區塊-->
        <section class="articles">
            <h3>文章列表</h3>
            <?php for($i=0; $i<5;$i++):;?>
            <article class="article-item w-100 border rounded p-3 my-2">
                <div class="d-flex justify-content-between">
                    <div class="article-title text-md bolder"><?=$i;?>. 很好玩</div>
                    <time class="article-date text-sm"><?=date("Y-m-d H:i:s");?></time>
                </div>
                <div class="d-flex">
                    <div class="article-excerpt pl-4">有好多好玩的遊戲......</div>
                    <a href="javascript:loadpage('./front/article.php')" class="article-readmore text-right text-sm">閱讀更多</a>
                </div>
            </article>
            <?php endfor;?>
    
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