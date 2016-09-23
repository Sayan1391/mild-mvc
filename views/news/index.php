<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" type="text/css" href="/../style/style.css">
</head>
<body>

<div class="create">
    <a href="create">Добавить</a>
</div>

<div class="page">
    <?php foreach ($data as $info): ?>
        <div class="news">
            <div class="theme-box"><?= $info->title; ?></div>
            <div class="news-box"><?= $info->description; ?></div>
            <div class="status">
                <a href="view?id=<?= $info->id; ?>">Подробнее</a>
                <a href="update?id=<?= $info->id; ?>">Редактировать</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>