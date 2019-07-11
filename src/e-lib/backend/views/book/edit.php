<?php
/**
 * @var \yii\web\View $this
 * @var \backend\models\BookForm $model
 * @var \common\models\Author[] $authors
 */

use yii\helpers\Html;

$this->title = 'Добавление книги';
?>
<form method="post" action="/book/edit?id=<?= $model->getBookID() ?>">
    <?= yii\helpers\Html:: hiddenInput(\Yii:: $app->getRequest()->csrfParam, \Yii:: $app->getRequest()->getCsrfToken(), []) ?>
    <div class="row">
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Данные книги</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">Название книги</label>
                        <input class="form-control" type="text" name="BookForm[name]" placeholder="Название книги" value="<?= $model->name ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Количество страниц</label>
                        <input class="form-control" type="text" name="BookForm[pages]" placeholder="Количество страниц" value="<?= $model->pages ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Издатель</label>
                        <input class="form-control" type="text" name="BookForm[publisher]" placeholder="Издатель" value="<?= $model->publisher ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Год издания</label>
                        <input class="form-control" type="text" name="BookForm[year]" placeholder="Год издания" value="<?= $model->year ?>">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Тип обложки</label>
                        <select class="form-control" name="BookForm[cover]">
                            <option  value="1" <?= ($model->cover==1)?'selected':null ?>>Мягкая</option>
                            <option value="2" <?= ($model->cover==2)?'selected':null ?>>Твердая</option>
                        </select>
                    </div>
                </div>
                <div class="box-footer">
                    <?= Html::submitButton('Добавить книгу', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'create-book']) ?>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header">
                    <h3 class="box-title">Автор книги</h3><br>
                    <button id="existing-author" class="btn btn-primary btn-flat">Существующий автор</button>
                    <button id="new-author" class="btn btn-success btn-flat">Новый автор</button>
                </div>
                <div id="book-author" class="box-body">
                    <div class="form-group">
                        <select class="form-control" name="BookForm[author_id]">
                            <?php foreach ($authors as $author){ ?>
                                <option value="<?= $author->id ?>" <?= ($model->author_id==$author->id)?'selected':null ?>><?= $author->getName() ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>