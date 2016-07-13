<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Payments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pmnt_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pmnt_user_id')->textInput() ?>

    <?= $form->field($model, 'pmnt_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pmnt_amount')->textInput() ?>

    <?= $form->field($model, 'pmnt_mode')->dropDownList([ 'Cheque' => 'Cheque', 'Transfer' => 'Transfer', 'Cash' => 'Cash', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pmnt_chequeortrans_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pmnt_due')->textInput() ?>

    <?= $form->field($model, 'pmnt_paid')->textInput() ?>

    <?= $form->field($model, 'pmnt_paid_date')->textInput() ?>

    <?= $form->field($model, 'pmnt_due_date')->textInput() ?>

    <?= $form->field($model, 'pmnt_updated')->textInput() ?>

    <?= $form->field($model, 'pmnt_deleted')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
