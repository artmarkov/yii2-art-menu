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

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">

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

        <div class="col-md-4">

            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="record-info">

                        <?php if (!$model->isNewRecord): ?>
                            <div class="form-group">
                                <label class="control-label" style="float: left; padding-right: 5px;">
                                    <?= $model->attributeLabels()['id'] ?> :
                                </label>
                                <span><?= $model->id ?></span>
                            </div>
                        <?php endif; ?>

                        <div class="form-group">
                            <?php if ($model->isNewRecord): ?>

                                <?= Html::submitButton(Yii::t('art', 'Create'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('art', 'Cancel'), ['/menu/default/index'], ['class' => 'btn btn-default']) ?>

                            <?php else: ?>

                                <?= Html::submitButton(Yii::t('art', 'Save'), ['class' => 'btn btn-primary']) ?>
                                <?= Html::a(Yii::t('art', 'Delete'), ['/menu/default/delete', 'id' => $model->id], [
                                    'class' => 'btn btn-danger',
                                    'data' => [
                                        'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                        'method' => 'post',
                                    ],
                                ]) ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
