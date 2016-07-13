<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\editbusiness */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="editbusiness-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'edit_ven_id')->textInput() ?>

    <?= $form->field($model, 'edit_bui_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edit_bui_contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'edit_type')->dropDownList([ 'B' => 'B', 'I' => 'I', 'S' => 'S', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'edit_user_type')->dropDownList([ 'U' => 'U', 'B' => 'B', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'edit_bui_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Rejected' => 'Rejected', 'Resolved' => 'Resolved', 'Pending' => 'Pending', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
