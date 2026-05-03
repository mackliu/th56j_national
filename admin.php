<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>56屆選手練習</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body>
  <header  class="d-flex p-4 justify-content-between border-bottom">
    <div>
        <img src="icon/logo.png" alt="">
        <a href="index.php">大眾運輸查詢系統</a>
    </div>
    <div>
        <a class='mx-3' href="admin.php">系統管理</a>
        <a class='mx-3' href="./api/logout.php">登出</a>
    </div>
  </header>
  <nav class='p-2'>
    <span class="m-btn btn btn-light" data-btn="routes" onclick="loadpage(this)">路線管理</span>
    <span class="m-btn btn btn-light" data-btn="buses" onclick="loadpage(this)">車輛管理</span>
    <span class="m-btn btn btn-light" data-btn="stations" onclick="loadpage(this)">站點管理</span>
    <span class="m-btn btn btn-light" data-btn="forms" onclick="loadpage(this)">表單管理</span>
  </nav>

  <main>

  </main>
  <footer>

  </footer>
 
  <div id="Modal">
    
  </div>
   
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
<script>
loadpage($("span[data-btn='routes']"))
function loadpage(dom){
    let btn=$(dom).data('btn')
    let page="back/"+ btn + "_manage.php";
    $.get(page,function(r){
        $("main").html(r)
        $(".m-btn").removeClass("active")
        $(dom).addClass('active')
    })
}
</script>
