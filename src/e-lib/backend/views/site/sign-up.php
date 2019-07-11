<?php
/**
 * @var \yii\web\View $this
 * @var \backend\models\SignUpForm $model
 */
use yii\widgets\ActiveForm;
use yii\helpers\Html;

$this->title='Регистрация';

$fieldOptions = [
    'options' => ['class' => 'form-group has-feedback']
];
?>

<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>E</b>Lib</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Заполните данные для регистрации</p>
        <?php $form=ActiveForm::begin(); ?>
        <?= $form
            ->field($model, 'username', $fieldOptions)
            ->label(false)
            ->textInput(['placeholder' => 'Имя пользователя'])  ?>
        <?= $form
            ->field($model, 'email', $fieldOptions)
            ->label(false)
            ->textInput(['placeholder' =>'E-mail'])  ?>
        <?= $form
            ->field($model, 'password', $fieldOptions)
            ->label(false)
            ->passwordInput(['placeholder' => 'Пароль'])  ?>
        <div class="row">
            <div class="col-xs-8">
                <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'signup-button']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
        <a href="/site/login" class="text-center">Уже есть аккаунт?</a>
    </div>
</div>
