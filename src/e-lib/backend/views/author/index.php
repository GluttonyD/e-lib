<?php
/**
 * @var \common\models\Author[] $authors
 * @var \yii\web\View $this
 */

$this->title='Список авторов';
?>
<div class="row">
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Список авторов</h3>
                <div class="dataTables_wrapper form-inline dt-bootstrap">
                    <div class="row"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-hover dataTable" role="grid">
                                <thead>
                                <tr role="row">
                                    <th>Имя</th>
                                    <th>Фамилия</th>
                                    <th>Отчество</th>
                                    <th>Город рождения</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($authors as $author) { ?>
                                    <tr role="row" class="author" id="author-<?=$author->id ?>">
                                        <td><?= $author->name ?></td>
                                        <td><?= $author->surname ?></td>
                                        <td><?= $author->patronymic ?></td>
                                        <td><?= $author->birth ?></td>
                                        <td>
                                            <a  href="/author/edit?id=<?= $author->id ?>" class="glyphicon glyphicon-pencil author-edit" title="Редактировать"></a>
                                            <a id="<?= $author->id ?>" href="/author/delete" class="glyphicon glyphicon-erase author-delete" title="Удалить"></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

