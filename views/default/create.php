<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\menu\models\Menu */

$this->title = Yii::t('art', 'Create {item}', ['item' => Yii::t('art/menu', 'Menu')]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/menu', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="menu-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>