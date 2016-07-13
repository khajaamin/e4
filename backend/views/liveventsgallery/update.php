<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Livevents */

$this->title = 'Update Livevents Galleries: ' . ' ' . $model->le_id;
$this->params['breadcrumbs'][] = ['label' => 'Livevents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->le_id, 'url' => ['view', 'id' => $model->le_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="livevents-update">

   <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'le_contact_name')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'le_role')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'le_event_category')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'le_event_name')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'le_description')->textArea(['readonly' => true]) ?>

    <?= $form->field($model, 'le_venue')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'le_city_id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'le_contacts')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'le_emailid')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'paid')->dropDownList([ 'N' => 'No', 'Y' => 'Yes', ], ['prompt' => 'Select']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
