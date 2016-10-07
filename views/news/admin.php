<div class="page">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $info): ?>
            <tr>
                <td><?= $info->title; ?></td>
                <td><?= $info->description; ?></td>
                <td>
                    <a href="/news/view?id=<?= $info->id; ?>" class="glyphicon glyphicon-eye-open" role="button"></a>
                    <a href="/news/update?id=<?= $info->id; ?>" class="glyphicon glyphicon-wrench" role="button"></a>
<!--                    <a onclick="ajaxNewsDelete()" class="glyphicon glyphicon-remove" role="button"></a>-->
                    <input type="hidden" name="id" value="<?= $data->id; ?>">
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

