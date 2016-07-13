<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\Vendors;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Videos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="videos-form">

    <?php $form = ActiveForm::begin(); 
    $userId = \Yii::$app->user->identity->id; ?>
    <div class="row">
    <div class="col-sm-6">
     <?= $form->field($model, 'vdo_ven_id')->dropDownList(
     ArrayHelper::map(Vendors::find()->where(['ven_contact_person_id' =>  $userId, 'deleted' => 'N'])->all(), 'ven_id', 'ven_company_name'),
           [
            'prompt' => 'Select Company',
            ]); ?>
    </div>
    </div>
    
    <div class="row">
    <div class="col-sm-6">
    <?= $form->field($model, 'vdo_url')->textInput(['maxlength' => true]) ?>
    </div>
    </div>
   <!--  <?= $form->field($model, 'vdo_user_id')->textInput() ?>

    <?= $form->field($model, 'vdo_ven_id')->textInput() ?> -->
<!-- 
    <?= $form->field($model, 'vdo_approved')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'vdo_created')->textInput() ?>

    <?= $form->field($model, 'vdo_updated')->textInput() ?>

    <?= $form->field($model, 'deleted')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>
 -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
