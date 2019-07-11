<?php
/**
 * @var \yii\web\View $this
 * @var \backend\models\AuthorForm $model
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title='Редактирование автора';
?>
<div class="row">
    <div class="col-md-3">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">
                    Данные автора
                </h3>
            </div>
            <?php $form=ActiveForm::begin(); ?>
            <div class="box-body">
                <?= $form->field($model,'name')->textInput(['placeholder'=>'Имя автора'])->label('Имя автора') ?>
                <?= $form->field($model,'surname')->textInput(['placeholder'=>'Фамилия автора'])->label('Фамилия автора') ?>
                <?= $form->field($model,'patronymic')->textInput(['placeholder'=>'Отчество автора'])->label('Отчество автора') ?>
                <?= $form->field($model,'birth')->textInput(['placeholder'=>'Город рождения'])->label('Город рождения') ?>
            </div>
            <div class="box-footer">
                <?= Html::submitButton('Сохранить изменения', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'create-author']) ?>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>
