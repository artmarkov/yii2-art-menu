<?php

use artsoft\grid\GridPageSize;
use artsoft\grid\GridView;
use artsoft\helpers\Html;
use artsoft\helpers\FA;
use artsoft\models\Menu;
use artsoft\models\MenuLink;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel artsoft\menu\models\search\SearchMenuLink */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('art/menu', 'Menu Links');
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/menu', 'Menus'), 'url' => ['/menu/default/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="menu-link-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="lte-hide-title page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('art', 'Add New'), ['/menu/link/create'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">

            <div class="row">
                <div class="col-sm-12 text-right">
                    <?= GridPageSize::widget(['pjaxId' => 'menu-link-grid-pjax']) ?>
                </div>
            </div>

            <?php Pjax::begin(['id' => 'menu-link-grid-pjax']) ?>

            <?=
            GridView::widget([
                'id' => 'menu-link-grid',
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'bulkActionOptions' => [
                    'gridId' => 'menu-link-grid',
                    'actions' => [Url::to(['bulk-delete']) => Yii::t('art', 'Delete')]
                ],
                'columns' => [
                    ['class' => 'artsoft\grid\CheckboxColumn', 'options' => ['style' => 'width:10px']],
                    [
                        'attribute' => 'image',
                        'value' => function (MenuLink $model) {
                            return FA::icon($model->image)->fixedWidth();
                        },
                        'format' => 'raw',
                        'contentOptions' => [
                            'style' => 'width:20px; text-align:center;'
                        ]
                    ],
                    [
                        'class' => 'artsoft\grid\columns\TitleActionColumn',
                        'controller' => '/menu/link',
                        'attribute' => 'id',
                        'title' => function (MenuLink $model) {
                            return Html::a($model->label,
                                ['/menu/link/update', 'id' => $model->id], ['data-pjax' => 0]);
                        },
                        'format' => 'raw',
                        'buttonsTemplate' => '{update} {delete}',
                        'options' => ['style' => 'width:220px']
                    ],
                    [
                        'attribute' => 'menu_id',
                        'filter' => ArrayHelper::merge(['' => Yii::t('art', 'Not Selected')], Menu::getMenus()),
                        'value' => function (MenuLink $model) {
                            return ($model->menu instanceof Menu) ? $model->menu->title : Yii::t('yii', '(not set)');
                        },
                        'format' => 'raw',
                    ],
                    'link',


                    'parent_id',
                    'order',
                ],
            ]);
            ?>

            <?php Pjax::end() ?>
        </div>
    </div>
</div>


