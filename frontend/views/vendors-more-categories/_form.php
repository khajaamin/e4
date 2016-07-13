<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\VendorsMoreCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendors-more-categories-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ven_id')->textInput() ?>

    <?= $form->field($model, 'bmc_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bsc_id')->textInput() ?>
<!-- 
    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'deleted')->dropDownList([ 'Y' => 'Yes', 'N' => 'No', ], ['prompt' => '']) ?>
 -->
    <?= $form->field($model, 'vmc_approved')->dropDownList([ 'Yes' => 'Yes', 'No' => 'No', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
