<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\BusinessMainCategories;
use common\models\BusinessSubCategories;
use common\models\Countries;
use common\models\States;
use common\models\Locations;
use common\models\Cities;
use common\models\User;
use kartik\date\DatePicker;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model common\models\Vendors */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vendors-form">

    <?php $form = ActiveForm::begin(['id'=>'dynamic-form', 'options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'ven_company_name')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'ven_company_descr')->textArea(['readonly' => true]) ?>

    <?= $form->field($model, 'ven_email_id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'ven_address')->textInput(['readonly' => true]) ?>
  
    <?= $form->field($model, 'ven_website')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'paid')->dropDownList([ 'Y' => 'Yes', 'N' => 'No', ], ['prompt' => 'Select']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>