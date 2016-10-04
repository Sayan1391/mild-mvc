<form action="" method="post">
    <div class="form-group">
        <label for="title">Загаловок</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $data->title; ?>">
    </div>
    <div class="form-group">
        <label for="description">Описание</label>
        <textarea class="form-control" id="description" name="description"><?= $data->description; ?></textarea>
    </div>
    <div class="button-update">
        <input type="button" onclick="ajaxNewsUpdate()" class="btn btn-primary" value="Обновить">
    </div>

    <div class="button-update">
        <input type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" value="Удалить">
    </div>
    <input type="hidden" name="id" value="<?= $data->id; ?>">
</form>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Вы уверены что хотите удалить эту новость?</h4>
            </div>
            <div class="modal-footer">
                <input type="button" onclick="ajaxNewsDelete()" class="btn btn-primary" value="Да">
                <button type="button" class="btn btn-default" data-dismiss="modal">Нет</button>
            </div>
        </div>
    </div>
</div>