<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Complaints */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="complaints-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'comp_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comp_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comp_user_id')->textInput() ?>

    <?= $form->field($model, 'comp_vendor_id')->textInput() ?>

    <?= $form->field($model, 'comp_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comp_video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comp_audio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comp_status')->dropDownList([ 'Pending' => 'Pending', 'Resolve' => 'Resolve', 'Rejected' => 'Rejected', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'comp_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comp_created')->textInput() ?>

    <?= $form->field($model, 'comp_updated')->textInput() ?>

    <?= $form->field($model, 'com_deleted')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
