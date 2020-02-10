<?php

use artsoft\helpers\Html;
use artsoft\widgets\ActiveForm;
use artsoft\widgets\LanguagePills;

/* @var $this yii\web\View */
/* @var $model artsoft\models\Menu */
/* @var $form artsoft\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php
    $form = ActiveForm::begin([
        'id' => 'menu-form',
        'validateOnBlur' => false,
    ])
    ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">

                    <?php if ($model->isMultilingual()): ?>
                        <?= LanguagePills::widget() ?>
                    <?php endif; ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?php if ($model->isNewRecord): ?>
                        <?= $form->field($model, 'id')->textInput(['maxlength' => true]) ?>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="panel-footer">
            <div class="form-group">
                <?= Html::a(Yii::t('art', 'Go to list'), ['/menu/default/index'], ['class' => 'btn btn-default']) ?>
                <?= Html::submitButton(Yii::t('art', 'Save'), ['class' => 'btn btn-primary']) ?>
                <?php if (!$model->isNewRecord): ?>
                    <?= Html::a(Yii::t('art', 'Delete'), ['/menu/default/delete', 'id' => $model->id], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'method' => 'post',
                        ],
                    ]) ?>

                <?php endif; ?>
            </div>
            <?= \artsoft\widgets\InfoModel::widget(['model'=>$model]); ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
