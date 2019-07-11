<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\Book[] $books
 */

$this->title='Список книг';
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
                                    <th>Название</th>
                                    <th>Издатель</th>
                                    <th>Количество страниц</th>
                                    <th>Год издания</th>
                                    <th>Тип обложки</th>
                                    <th>Автор</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($books as $book) { ?>
                                    <tr role="row" class="book" id="book-<?=$book->id ?>">
                                        <td><?= $book->name ?></td>
                                        <td><?= $book->publisher ?></td>
                                        <td><?= $book->pages ?></td>
                                        <td><?= $book->year ?></td>
                                        <td><?= $book->getCover() ?></td>
                                        <td><?= $book->author->name.' '.$book->author->surname ?></td>
                                        <td>
                                            <a  href="/book/detail?id=<?= $book->id ?>" class="glyphicon glyphicon-eye-open book-edit" title="Просмотр информации"></a>
                                            <a  href="/book/edit?id=<?= $book->id ?>" class="glyphicon glyphicon-pencil book-edit" title="Редактировать"></a>
                                            <a id="<?= $book->id ?>" href="/book/delete" class="glyphicon glyphicon-erase book-delete" title="Удалить"></a>
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
