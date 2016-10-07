<form action="" method="post">
    <div class="account form-group">
        <label for="login">Логин</label>
        <input type="text" class="form-control login" name="login" id="login" placeholder="Логин">
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control password" name="password" id="password" placeholder="Пароль">
    </div>

    <input  type="button" onclick="ajaxUserAccount()" class="btn btn-default" value="Войти">
</form>