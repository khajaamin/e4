<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Gallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

   <?= $form->field($model, 'file')->fileInput() ?>
    <?php
    if ($model->gallery_image) {
        echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/'.$model->gallery_image.'" width="90px">&nbsp;&nbsp;&nbsp;';
        echo Html::a('Delete Image', ['deleteimg', 'id'=>$model->gallery_id, 'field'=> 'gallery_image'], ['class'=>'btn btn-danger']).'<p>';
    }
    ?>

    <?= $form->field($model, 'gallery_approved')->dropDownList([ 'Y' => 'Yes', 'N' => 'No', ], ['prompt' => 'Select']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
