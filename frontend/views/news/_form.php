<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Vendors;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); 
    $userId = \Yii::$app->user->identity->id; ?>
    
    <div class="row">
    <div class="col-sm-6">
     <?= $form->field($model, 'news_ven_id')->dropDownList(
     ArrayHelper::map(Vendors::find()->where(['ven_contact_person_id' =>  $userId, 'deleted' => 'N'])->all(), 'ven_id', 'ven_company_name'),
           [
            'prompt' => 'Select Company',
            ]); ?>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'news_heading')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'news_description')->textArea(['rows' => '10','cols' => '5'])?>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-6">
     <?= $form->field($model, 'file')->fileInput() ?>
    <?php
    if ($model->news_image) {
        echo '<img src="'.\Yii::$app->urlManagerCommon->baseUrl.'/'.$model->news_image.'" width="90px">&nbsp;&nbsp;&nbsp;';
        echo Html::a('Delete Image', ['deleteimg', 'id'=>$model->news_id, 'field'=> 'news_image'], ['class'=>'btn btn-danger']).'<p>';
    }
    ?>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'news_video')->textInput(['maxlength' => true]) ?>
    </div>
    </div>

    <div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'news_expiry_date')->textInput() ?>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
