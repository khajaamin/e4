<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\BusinessMainCategories;
/* @var $this yii\web\View */
/* @var $model app\models\BusinessSubCategories */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="business-sub-categories-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'bsc_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file')->fileInput() ?>
    <?php
    if ($model->bsc_image) {
        echo '<img src="'.\Yii::$app->urlManagerAdminBackend->baseUrl.'/'.$model->bsc_image.'" width="90px">&nbsp;&nbsp;&nbsp;';
        echo Html::a('Delete Image', ['deleteimg', 'id'=>$model->bsc_id, 'field'=> 'bsc_image'], ['class'=>'btn btn-danger']).'<p>';
    }
    ?>
    <?= $form->field($model, 'bsc_description')->textInput(['maxlength' => true]) ?>

    <!--DropdownList created here-->
    <?= $form->field($model, 'bmc_id')->dropDownList(
        ArrayHelper::map(BusinessMainCategories::find()->all(), 'bmc_id', 'bmc_name'),
        [
            'prompt' => 'Select Main Category',
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
