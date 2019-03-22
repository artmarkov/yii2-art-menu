<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model artsoft\menu\models\MenuLink */

$this->title = Yii::t('art/menu', 'Create Menu Link');
$this->params['breadcrumbs'][] = ['label' => Yii::t('art/menu', 'Menus'), 'url' => ['/menu/default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="menu-link-create">
    <h3 class="lte-hide-title"><?= Html::encode($this->title) ?></h3>
    <?= $this->render('_form', compact('model')) ?>
</div>