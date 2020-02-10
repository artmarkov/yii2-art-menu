<?php

use artsoft\helpers\Html;
use artsoft\helpers\FA;
use artsoft\models\Menu;
use artsoft\widgets\ActiveForm;
use artsoft\widgets\LanguagePills;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $model artsoft\menu\models\MenuLink */
/* @var $form artsoft\widgets\ActiveForm */

$formName = StringHelper::basename(\artsoft\menu\models\search\SearchMenuLink::className());
?>

    <div class="menu-link-form">

        <?php
        $form = ActiveForm::begin([
            'id' => 'menu-link-form',
            'validateOnBlur' => false,
        ])
        ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-8">

                        <?php if ($model->isMultilingual()): ?>
                            <?= LanguagePills::widget() ?>
                        <?php endif; ?>

                        <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

                        <?php if ($model->isNewRecord): ?>
                            <?= $form->field($model, 'id')->textInput() ?>
                        <?php endif; ?>

                        <?php //$form->field($model, 'parent_id')->dropDownList($model->getSiblings(), ['class' => 'clearfix']) ?>

                        <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

                        <?php // $form->field($model, 'order')->textInput() ?>

                    </div>

                    <div class="col-md-4">

                        <?php if ($model->isNewRecord): ?>
                            <?= $form->field($model, 'menu_id')->dropDownList(Menu::getMenus(), ['class' => 'clearfix form-control']) ?>
                        <?php endif; ?>

                        <?= $form->field($model, 'image')->dropDownList(FA::getIconsList(), [
                            'class' => 'clearfix form-control fa-font-family',
                            'encode' => false,
                        ]) ?>

                        <?= $form->field($model, 'alwaysVisible')->checkbox() ?>

                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <?= Html::a(Yii::t('art', 'Go to list'),  ['/menu/default/index',"{$formName}[menu_id]" => $model->menu_id], ['class' => 'btn btn-default']) ?>
                    <?= Html::submitButton(Yii::t('art', 'Save'), ['class' => 'btn btn-primary']) ?>
                    <?php if (!$model->isNewRecord): ?>
                        <?= Html::a(Yii::t('art', 'Delete'),
                            ['/menu/link/delete', 'id' => $model->id], [
                                'class' => 'btn btn-danger',
                                'data' => [
                                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                                    'method' => 'post',
                                ],
                            ]) ?>
                    <?php endif; ?>
                </div>
                <?= \artsoft\widgets\InfoModel::widget(['model' => $model]); ?>
            </div>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<?php
$js = <<<JS

    $('#menulink-image-styler ul li').each(function(){
        var glyphicon = $(this).text();
        $(this).addClass('glyphicon').addClass('glyphicon-'+glyphicon).html('');
    });
    $('#menulink-image-styler ul li:first').html('No Icon');

    setTimeout(function(){
       
    },1000);
    

JS;
$this->registerJs($js);
?>