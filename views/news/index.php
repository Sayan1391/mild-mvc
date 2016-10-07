<div class="row">
    <div class="col-md-12">
        <a href="create" class="create btn btn-primary">Добавить</a>
    </div>
</div>

<div class="row">
    <?php foreach ($data as $info): ?>
    <div class="col-sm-6 col-md-4">
        <div class="thumbnail">
            <div class="caption">
                <h3><?= $info->title; ?></h3>
                <p><?= $info->description; ?></p>
                <p>
                    <a href="/news/view?id=<?= $info->id; ?>" class="btn btn-default" role="button">Подробнее</a>
                    <a href="/news/update?id=<?= $info->id; ?>" class="btn btn-default" role="button">Редактировать</a>
                </p>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
