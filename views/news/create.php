<form action="" method="post">

    <div class="theme-block blocks">
        <label for="title">Загаловок</label><br>
        <input name="title" id="title" type="text">
    </div>

    <div class="news-block blocks">
        <label for="description">Описание</label><br>
        <textarea name="description" id="description"></textarea>
    </div>
    
    <div><input type="button" onclick="ajaxNewsCreate()" value="Добавить"></div>
</form>
