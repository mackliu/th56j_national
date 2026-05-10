        <section class="articles">
            <?php for($i=0; $i<5;$i++):;?>
            <article class="article-item w-100 border rounded p-3 my-2">
                <div class='d-flex justify-content-between'>
                    <div class="article-title text-md bolder"><?=$i;?>. 很好玩</div>
                    <time datetime="" class="article-date text-sm"><?=date("Y-m-d H:i:s");?></time>
                </div>
                <div class="article-excerpt">有好好的遊戲......</div>
                <div class='text-right'>
                    <a href="" class="article-readmore">More</a>
                </div>
            </article>
            <?php endfor;?>

        </section>
        <aside class="notifications">
            <?php for($i=0; $i<5;$i++):;?>
            <div class="notification-item border-bottom my-1">
                <div class="notification-title text-lg">公告事項:<?=$i;?></div>
                <time datetime="" class="notification-date"><?=date("Y-m-d H:i:s");?></time>
            </div>
            <?php endfor;?>
        </aside>