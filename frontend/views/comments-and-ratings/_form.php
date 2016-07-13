<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CommentsAndRatings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comments-and-ratings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cr_comment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cr_ratings')->textInput() ?>

    <?= $form->field($model, 'cr_type')->dropDownList([ 'B' => 'B', 'E' => 'E', 'V' => 'V', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cr_type_id')->textInput() ?>

    <?= $form->field($model, 'cr_user_id')->textInput() ?>

    <?= $form->field($model, 'cr_verified')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'cr_created')->textInput() ?>

    <?= $form->field($model, 'cr_updated')->textInput() ?>

    <?= $form->field($model, 'deleted')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
