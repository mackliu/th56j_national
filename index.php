<?php include_once "./api/db.php";?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fun Tech</title>
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="./assets/style.css">
    <script src="./assets/jquery/jquery.js"></script>
    <script src="./assets/js.js"></script>
</head>

<body>
    <div id="home" class='container'>
        <header class="site-header d-flex p-3 justify-content-between border-bottom">
            <div class="brand" style='border:1px solid #ccc;width:30px;height:30px;background:green'>
                <a href="index.php" class="brand-link">
                    <img src="./assets/logo.png" alt="" style="width:48px">
                </a>
            </div>
            <nav class="main-nav">
                <a href="javascript:loadpage('./front/main.php')" class="btn btn-info mx-2 home-link">首頁</a>
                <a href="javascript:loadpage('./front/games.php')" class="btn btn-info mx-2 games-link">遊戲</a>
                <a href="javascript:loadpage('./front/friends-page.php')" class="btn btn-info mx-2 friends-link">好友</a>
            </nav>
            <div class="user-area">
                <?php if(!isset($_SESSION['login'])): ;?>
                <div class='nav-btn'>
                    <a href="javascript:loadpage('./front/login.php')" class="btn btn-primary mx-2 login-link">登入</a>
                    <a href="javascript:loadpage('./front/register.php')" class="btn btn-success mx-2 register-link">註冊</a>
                </div>
                <?php else:;?>
                <div class="user-badge">
                    <a href="javascript:loadpage('./front/profile-page.php')" class="btn btn-success mx-2 profile-link">個人頁面</a>
                    <a href="javascript:location.href='./api/logout.php'" class="btn btn-success mx-2 logout-link">登出</a>
                </div>
                <?php endif;?>
            </div>
        </header>
        <main class="p-3" id="content">
        </main>
    </div>
    <script src="./assets/bootstrap/bootstrap.js"></script>
    <script>
        loadpage("./front/main.php");
    </script>
</body>

</html>