<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model common\models\Spotlight */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spotlight-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'spotlt_heading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spotlt_description')->textArea(['rows' => '10','cols' => '5'])?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?php
    if ($model->spotlt_image) {

        echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/'.$model->spotlt_image.'" width="90px">&nbsp;&nbsp;&nbsp;';
        echo Html::a('Delete Image', ['deleteimg', 'id'=>$model->spotlt_id, 'field'=> 'spotlt_image'], ['class'=>'btn btn-danger']).'<p>';
    }
    ?>

    
    <?= $form->field($model, 'spotlt_video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spotlt_expery_date')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Choose Expiry date ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'startDate' => date("Y-m-d"),
        'todayHighlight' => true,
    ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
