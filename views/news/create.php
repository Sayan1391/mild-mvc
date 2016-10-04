<form action="" method="post">
    <div class="form-group">
        <label for="title">Загаловок</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Загаловок">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" id="description" name="description" placeholder="Описание"></textarea>
    </div>
    <div><input type="button" onclick="ajaxNewsCreate()" class="btn btn-default" value="Добавить"></div>
</form>