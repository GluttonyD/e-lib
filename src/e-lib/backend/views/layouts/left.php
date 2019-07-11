<?php
/**
 * @var \common\models\User $user
 */

$user=Yii::$app->user->getIdentity();
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= $user->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],

                    [
                        'label' => 'Авторы',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'file-code-o', 'url' => ['/author/index'],],
                            ['label' => 'Добавить', 'icon' => 'dashboard', 'url' => ['/author/create'],],

                        ],
                    ],
                    [
                        'label' => 'Книги',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'file-code-o', 'url' => ['/book/index'],],
                            ['label' => 'Добавить', 'icon' => 'dashboard', 'url' => ['/book/create'],],

                        ],
                    ],
                    ['label'=>'Экспорт в EXCEL','icon'=>'file-excel-o','url'=>['/excel/export']],
                ],
            ]
        ) ?>

    </section>

</aside>
