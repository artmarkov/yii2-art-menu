<?php

use artsoft\grid\GridView;
use artsoft\helpers\Html;
use artsoft\models\Menu;
use artsoft\models\User;
use artsoft\menu\assets\MenuAsset;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $searchModel artsoft\menu\models\search\SearchMenu */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title                   = Yii::t('art/menu', 'Menus');
$this->params['breadcrumbs'][] = $this->title;

MenuAsset::register($this);
?>
<div class="menu-index">

    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title"><?= Html::encode($this->title) ?></h3>
            <?= Html::a(Yii::t('art/menu', 'Add New Menu'), ['/menu/default/create'], ['class' => 'btn btn-sm btn-success']) ?>
            <?= Html::a(Yii::t('art/menu', 'Add New Link'), ['/menu/link/create'], ['class' => 'btn btn-sm btn-success']) ?>

            <?= Alert::widget([
                'options' => ['class' => 'alert-primary menu-link-alert'],
                'body' => '<span class="glyphicon glyphicon-refresh glyphicon-spin"></span>',
            ]) ?>

            <?= Alert::widget([
                'options' => ['class' => 'alert-danger menu-link-alert'],
                'body' => Yii::t('art/menu', 'An error occurred during saving menu!'),
            ]) ?>
            
            <?= Alert::widget([
                'options' => ['class' => 'alert-info menu-link-alert'],
                'body' => Yii::t('art/menu', 'The changes have been saved.'),
            ]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?=
                    GridView::widget([
                        'id' => 'menu-grid',
                        'dataProvider' => $dataProvider,
                        'layout' => '{items}',
                        'columns' => [
                            [
                                'class' => 'artsoft\grid\columns\TitleActionColumn',
                                'controller' => '/menu/default',
                                'buttonsTemplate' => '{update} {delete}',
                                'title' => function (Menu $model) {
                                    if (User::hasPermission('viewMenuLinks')) {
                                        return Html::a($model->title, ['/menu/default/index', 'SearchMenuLink[menu_id]' => $model->id], ['data-pjax' => 0]);
                                    } else {
                                        return Html::a($model->title, ['/menu/default/view', 'id' => $model->id], ['data-pjax' => 0]);
                                    }
                                },
                            ],
                        ],
                    ])
                    ?>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="sortable-container menu-itemes">
                        <?=
                        $this->render('links', [
                            'searchLinkModel' => $searchLinkModel,
                            'searchParams' => ['parent_id' => ''],
                        ]);
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


