<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Livevents */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="livevents-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'le_contact_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_role')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_event_category')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_event_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_venue')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_city_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_contacts')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'le_emailid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verified')->dropDownList([ 'N' => 'No', 'Y' => 'Yes', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
