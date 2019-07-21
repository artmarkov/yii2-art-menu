<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\menu\models\MenuLink */

$this->title = Yii::t('art/menu', 'Create Menu Link');
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/menu', 'Menus'), 'url' => ['/menu/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="menu-link-create">
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-title"><?=  Html::encode($this->title) ?></h3>            
        </div>
    </div>
    <?= $this->render('_form', compact('model')) ?>
</div>