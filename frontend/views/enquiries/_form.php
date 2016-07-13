<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Enquiries */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enquiries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'enq_user_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enq_ven_id')->textInput() ?>

    <?= $form->field($model, 'enq_bsc_id')->textInput() ?>

    <?= $form->field($model, 'enq_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enq_mob')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enq_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enq_sub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enq_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contacted')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'submited')->textInput() ?>

    <?= $form->field($model, 'deleted')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
