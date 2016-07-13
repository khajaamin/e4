<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\BusinessMainCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-main-categories-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'bmc_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?php
    if ($model->bmc_image) {
        echo '<img src="'.\Yii::$app->urlManagerAdminBackend->baseUrl.'/'.$model->bmc_image.'" width="90px">&nbsp;&nbsp;&nbsp;';
        echo Html::a('Delete Image', ['deleteimg', 'id'=>$model->bmc_id, 'field'=> 'bmc_image'], ['class'=>'btn btn-danger']).'<p>';
    }
    ?>

    <?= $form->field($model, 'bmc_description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
