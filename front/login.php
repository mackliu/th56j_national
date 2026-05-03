<h2 class="text-center">網站管理-登入</h2>
<form action="./api/login.php" method="post" id="LoginForm">
    <div class="form-group row">
        <label for="">帳號</label>
        <input type="text" class="form-control" name='acc'>
    </div>
    <div class="form-group row">
        <label for="">密碼</label>
        <input type="password" class="form-control" name='pw'>
    </div>
    <div class="form-group">
        <div class='row'>
            <label for="">驗證碼</label>
            <input type="text" class="form-control" name='check'>
        </div>
        <div>
            <button class="btn-warning">4289</button>
            <button class="btn-secondary">重新產生驗證碼</button>
        </div>
    </div>
    <div class="form-group">
        <input type="button" value="登入" onclick="getForm()" class='btn btn-success w-100'>
    </div>

</form>