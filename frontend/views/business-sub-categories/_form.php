<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BusinessSubCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-sub-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bsc_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bsc_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bsc_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bmc_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
