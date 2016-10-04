<form action="" method="post">
    <div class="form-group">
        <label for="login">Логин</label>
        <input type="text" class="form-control login" name="login" id="login" placeholder="Логин">
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control password" name="password" id="password" placeholder="Пароль">
    </div>
    <div class="form-group">
        <label for="retype-password">Повторить пароль</label>
        <input type="password" class="form-control retype-password" name="retype-password" id="retype-password" placeholder="Повторить пароль">
    </div>
    <div class="form-group">
        <label for="email">Email адрес</label>
        <input type="email" class="form-control email" name="email" id="email" placeholder="Email адрес">
    </div>
    <input  type="button" onclick="ajaxUserReg()" class="btn btn-default" value="Зарегистрироваться">
</form>