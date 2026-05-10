<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fun Tech</title>
    <link rel="stylesheet" href="/assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/style.css">
    <script src="/assets/jquery/jquery.js"></script>
    <script src="/assets/js.js"></script>

</head>

<body>
    <div id="home" class='container'>
        <header class="site-header d-flex p-3 justify-content-between border-bottom">
            <div class="brand" style='border:1px solid #ccc;width:30px;height:30px;background:green'>
                <a href="" class="brand-link"></a>
            </div>
            <nav class="main-nav">
                <a href="" class="btn btn-info mx-2 home-link">首頁</a>
                <a href="" class="btn btn-info mx-2 games-link">遊戲</a>
                <a href="" class="btn btn-info mx-2 friends-link">好友</a>
            </nav>
            <div class="user-area">
                <a href="" class="btn btn-primary mx-2 login-link">登入</a>
                <a href="" class="btn btn-success mx-2 register-link">註冊</a>
                <div class="user-badge">
                    <a href="" class="btn btn-success mx-2 profile-link">個人頁面入口</a>
                    <a href="" class="btn btn-success mx-2 logout-link">登出</a>
                </div>
            </div>
        </header>
        <section class="articles p-3">
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
        
    </div>




    <script src="/assets/bootstrap/bootstrap.js"></script>
</body>

</html>