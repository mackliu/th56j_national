<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>56屆選手練習</title>
    <link rel="stylesheet" href="css/bootstrap.css">

</head>
<body class='container'>
  <header class="d-flex p-4 justify-content-between border-bottom">
    <div>
        <img src="icon/logo.png" alt="">
        <a href="index.php">大眾運輸查詢系統</a>
    </div>
    <div>
        <a href="#" onclick="login()">系統管理</a>
    </div>
  </header>
  <main class='p-3'>
    

  </main>
  <footer></footer>
   
   
<script src="js/jquery-3.7.1.min.js"></script>
<script src="js/bootstrap.js"></script>
</body>
</html>
<script>
loadpage('./front/route_maps.php')
function loadpage(page){
     $.get(page,function(r){
        $("main").html(r)

    })
}

function login(){
    //1. 檢查是否已登入
    $.get("./api/check_login.php",(r)=>{
        if(parseInt(r)){
            location.href='admin.php';
        }
    })

    //2. 載入登入表單
    $.get("./front/login.php",(r)=>{
        $("main").html(r)
    })


}

function getForm(){
    let acc=$("#LoginForm input[name='acc']").val()
    let pw=$("#LoginForm input[name='pw']").val()
    //3. 送出表單登入
    $.post("./api/login.php",{acc,pw},(r)=>{
        console.log(acc,pw,r)
        if(parseInt(r)==1){
            location.href='admin.php';
        }else{
            alert("帳號或密碼錯誤,請重新登入")
            login();
        }
    })
}

</script>
