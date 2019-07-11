<?php
/**
 * @var \yii\web\View $this
 * @var \common\models\Book $book
 */

$this->title='Карточка книги';
?>

<div class="row">
    <div class="col-md-4">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    Информация о книге
                </h3>
            </div>
            <div class="box-body">
                <dl class="dl-horizontal">
                    <dt>Название книги</dt>
                    <dd><?= $book->name ?></dd>
                    <dt>Издатель</dt>
                    <dd><?= $book->publisher ?></dd>
                    <dt>Автор</dt>
                    <dd><?= $book->author->getFullName() ?></dd>
                    <dt>Количество страниц</dt>
                    <dd><?= $book->pages ?></dd>
                    <dt>Год издания</dt>
                    <dd><?= $book->year ?></dd>
                    <dt>Тип обложки</dt>
                    <dd><?= $book->getCover() ?></dd>
                    <dt>Последнее изменение</dt>
                    <dd><?= date('d-m-Y H:i',$book->updated_at+3*3600) ?></dd>
                    <dt>Время добавления</dt>
                    <dd><?= date('d-m-Y H:i',$book->created_at+3*3600) ?></dd>
                </dl>
            </div>
        </div>
    </div>
</div>
